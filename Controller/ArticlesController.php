<?php


class ArticlesController extends Controller
{

    /**
     * all articles function of user role
     */
    public function allArticles(){
        $list = 'for' . ucfirst($_SESSION['user']['role']) .'Articles';
        if(method_exists('ArticleManager', $list)){
            $this->render('all_articles', ['art' => ArticleManager::$list()]);
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
            // get selected project
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
        if(isset($_POST['submitBtn']) && $this->fieldsState('artTitle', 'artDescription')){
            //  get article data
            $title = $this->cleanEntries('artTitle');
            $description = $this->cleanEntries('artDescription');
            $author = UserManager::getUserById($_SESSION['user']['id']);
            $type = $this->fieldsState('type') ? TypeManager::getTypeById($_POST['type']) : null;
            $state = StateManager::stateByName('pr');
            $cat = $this->fieldsState('cat') ? $_POST['cat'] : null;
            $tech = $this->fieldsState('tech') ? $_POST['tech'] : null;

            // steps
            $step = new StepController();
            $steps = $step->createSteps();

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
                // display new project
                header("Location: /index.php?c=articles&p=one_article&o=$id");
                exit();
            }

        }
        else{
            $_SESSION['error'] = "Les champs obligatoires doivent ??tre remplis !";
            header("Location: /index.php?c=articles&p=art_form");
            exit();
        }
    }

    /**
     * @param $id
     */
    public function delArticle ($id){
        // get article owner
        $author = ArticleManager::getAuthorId($id)['author'];
        // author = user ou admin
        if(self::testAccess(['admin', 'modo']) || $_SESSION['user']['id'] == $author){
            // get article steps to delete uploads
            StepController::deleteUploadsByArt($id);
            // delete article
            ArticleManager::delArticleById($id);
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
        else{
            $_SESSION['error'] = 'Vous n\'avez pas l\'autorisation de supprimer cet article';
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

    /**
     * @param $id
     */
    public function updateArticle($id){
        $data = [
            'type' => TypeManager::getAllKeyName('type'),
            'category' => CategoryManager::getAllKeyName('category'),
            'technique' => TechnicManager::getAllKeyName('technique'),
            'article' => ArticleManager::oneArticle($id)
        ];
        $this->render('update_project', $data);
    }

    /**
     * Update an article.
     * @param $id
     */
    public function updateProject($id){
        if(isset($_POST['submitBtn']) && $this->fieldsState('artTitle', 'artDescription')){
            //  get article data
            $title = $this->cleanEntries('artTitle');
            $description = $this->cleanEntries('artDescription');
            $author = UserManager::getUserById($_SESSION['user']['id']);
            $type = $this->fieldsState('type') ? TypeManager::getTypeById($_POST['type']) : null;
            $state = StateManager::stateByName('pr');
            $cat = $this->fieldsState('cat') ? $_POST['cat'] : null;
            $tech = $this->fieldsState('tech') ? $_POST['tech'] : null;

            $article = new Article();
            $article
                ->setId(intval($id))
                ->setTitle($title)
                ->setDescription($description)
                ->setType($type)
                ->setState($state)
                ->setAuthor($author)
                ->setCategory($cat)
                ->setTechnic($tech)
            ;

            if(ArticleManager::updateArticle($article)){
                header("Location: /index.php?c=articles&p=one_article&o=$id");
                exit;
            }
        }
        else{
            $_SESSION['error'] = "Les champs obligatoires doivent ??tre remplis !";
            header("Location: /index.php?c=articles&p=update_article");
            exit;
        }
    }

    /**
     * @param $id
     */
    public function statusChange($id){
        self::testAccess(['admin', 'modo']);
        $currentStatus = ArticleManager::getArtStatus($id);
        switch($currentStatus['state']){
            case '1':
                ArticleManager::statusSwitch($id, '2');
                break;
            case '2' :
                ArticleManager::statusSwitch($id, '3');
                break;
            case '3':
                ArticleManager::statusSwitch($id, '1');
                break;
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        exit;
    }

    /**
     * display rubric form
     */
    public function rubricForm(){
        $this->render('rubric_form');
    }

    /**
     * @param $option
     */
    public function delRubric($option){
        $value = $this->getOption($option);
        if(self::testAccess(['admin'])){
            Manager::deleteName($value[0], $value[1]);
        }
        header('Location: /index.php?c=profile&p=admin');
        exit;
    }

}