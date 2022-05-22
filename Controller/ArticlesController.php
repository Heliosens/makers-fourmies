<?php


class ArticlesController extends Controller
{

    /**
     * all articles function of user role
     */
    public function allArticles(){
        $role = 'for' . ucfirst($_SESSION['user']['role']) .'Articles';
        if(method_exists('ArticleManager', $role)){
            $this->render('all_articles', ['art' => ArticleManager::$role()]);
        }
        else {
            $this->render('page404');
        }
    }

    /**
     * display every techniques name
     */
    public function allTechnic(){
        $this->render('techniques');
    }

    /**
     * display technique name and published articles use this technique
     * @param $option
     */
    public function oneTechnic($option){
        $data = [
            'title' => TechnicManager::techName($option),
            'projects' => ArticleManager::artByTechnic($option)
            ];
        $this->render('project_by_tech', $data);
    }

    /**
     * @param $option
     */
    public function oneArticle ($option){
        $this->connectedKeepGoing(true);
        if(null !== $option && $option !== 0){
            // get selected projects
            $data = [
                'article' => ArticleManager::oneArticle($option)
            ];
            $this->render('article', $data);
        }
        else{
            Router::error();
        }
    }

    /**
     * create article form
     */
    public function artForm (){
        $data = [
            'type' => TypeManager::getAllKeyName('type'),
            'category' => CategoryManager::getAllKeyName('category'),
            'technique' => TechnicManager::getAllKeyName('technique'),
        ];
        $this->render('art_form', $data);
    }

    /**
     *
     */
    public function addArt (){
        if(isset($_POST['submitBtn'])){
            if(!$this->fieldsState('artTitle', 'artDescription')){
                $_SESSION['error'] = "Les champs obligatoires doivent être remplis !";
                header('Location: /index.php?c=articles&p=art_form');
            }
            //  get article data
            $title = $this->cleanEntries('artTitle');
            $description = $this->cleanEntries('artDescription');
            $author = UserManager::getUserById($_SESSION['user']['id']);
            $type = $this->fieldsState('type') ? TypeManager::getTypeById($_POST['type']) : null;
            $state = StateManager::stateByName('pr');
            $cat = $this->fieldsState('cat') ? $_POST['cat'] : null;
            $tech = $this->fieldsState('tech') ? $_POST['tech'] : null;

            //  get step
            $stepController = new StepController();
            $steps = $stepController->addStep();

            $article = new Article();
            $article
                ->setTitle($title)
                ->setDescription($description)
                ->setType($type)
                ->setState($state)
                ->setStep($steps)
                ->setAuthor($author)
                ->setCategory($cat)
                ->setTechnic($tech)
            ;

            if(ArticleManager::addArticle($article)){
                $id = $article->getId();

            }
        }
    }

    /**
     * @param $id
     */
    public function delArticle ($id){
        // get article owner
        $author = ArticleManager::getAuthorId($id)['author'];
        // author = user ou admin
        if($this->testAccess(['admin', 'modo']) || $_SESSION['user']['id'] == $author){
            // get article steps to delete uploads
            UserController::deleteUserUploads($author);
            // delete article
            ArticleManager::delArticleById($id);
        }
        else{
            $_SESSION['Vous n\'avez pas l\'autorisation de supprimer cet article'];
            $this->render('home');
        }
    }

    /**
     * display article list by technique
     */
    public function artList(){
        $articles = ArticleManager::forUserArticles();
        $data = [];
        foreach ($articles as $art){
            $tech = $art->getTechnic();
            foreach ($tech as $item){
                $data[$item->getTechnique()][] = $art;
            }
        }
        $this->render('visitor', $data);


    }
}