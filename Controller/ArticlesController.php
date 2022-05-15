<?php


class ArticlesController extends Controller
{

    public function all_articles(){
        $data = ['art' => ArticleManager::allArticles()];
        $this->render('all_articles', $data);
    }

    /**
     * admin, modo, user -> publish articles        : publish
     * admin, modo -> publish, stand by articles    : !private
     * admin -> publish, stand by, private articles : all
     */
    public function articlesAccess ($param){
        // publish

        // !private

        // all

    }

    /**
     * display every techniques name
     */
    public function all_technic(){
        $this->render('techniques');
    }


    /**
     * @param $option
     */
    public function one_technic($option){
        $data = [
            'projects' => ArticleManager::artByTechnic($option),
            'title' => TechnicManager::techName($option)
            ];
        $this->render('project_by_tech', $data);
    }

    /**
     * @param $option
     */
    public function one_article ($option){
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
    public function art_form (){
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
    public function add_art (){
        if(!$this->fieldsState('artTitle', 'artDescription')){
            $_SESSION['error'] = "Les champs obligatoires doivent être remplis !";
            header('Location: index.php?c=articles&p=art_form');
        }

//         get article data
        $title = $this->cleanEntries('artTitle');
        $description = $this->cleanEntries('artDescription');
        $author = UserManager::getUserById($_SESSION['user']['id']);
        $type = $this->fieldsState('type') ? TypeManager::getTypeById($_POST['type']) : null;
        $state = StateManager::stateByName('pr');
        $cat = $this->fieldsState('cat') ? $_POST['cat'] : null;
        $tech = $this->fieldsState('tech') ? $_POST['tech'] : null;

//         get step
        $steps = $this->addStep();   // if step => title is required

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
            header('Location: index.php?c=articles&p=all_articles' . $id);
        }
    }

    /**
     * @return array
     */
    private function addStep ()
    {
        $steps = [];
        foreach ($_POST['stepTitle'] as $key => $item){
            $title = $this->cleanItem($item);

            $step = new Step();
            // get step image
            if(isset($_FILES['stepImage']) && $_FILES['stepImage']['error'][$key] === 0){
                $allowed = ['image/jpeg', 'image/jpg', 'image/png'];  // allowed mime type
                $maxSize = 4 * 1024 * 1024; // = 4 Mo
                if((int)$_FILES['stepImage']['size'][$key] <= $maxSize && in_array($_FILES['stepImage']['type'][$key], $allowed)){
                    $tmp_name = $_FILES['stepImage']['tmp_name'][$key];    // image temporary name
                    $ext = pathinfo($_FILES['stepImage']['name'][$key], PATHINFO_EXTENSION);   // file extension
                    $name = $this->createRandomName() . "." . $ext;
                    $step->setImgName($name);
                    move_uploaded_file($tmp_name, 'uploads/' . $name);
                }
                else{
                    $_SESSION['error'] = "L'image " . $this->cleanEntries($_FILES['name'][$key]) . " est trop grande";
                    header("Location: index.php?c=articles&p=art_form");
                }
            }
            else{
                $_SESSION['error'] = "erreur lors du chargement de l'image " . $this->cleanEntries($_FILES['name'][$key]);
                header("Location: index.php?c=articles&p=art_form");
            }

            $description = $this->cleanItem($_POST['stepDescription'][$key]);
            $tool = $this->cleanItem($_POST['stepTool'][$key]);
            $matter = $this->cleanItem($_POST['stepMatter'][$key]);

            $step
                ->setTitle($title)
                ->setDescription($description)
                ->setTool($tool)
                ->setMatter($matter)
            ;

            $steps[] = $step;
        }



        return $steps;
    }

    /**
     * @return string
     */
    private function createRandomName (): string {
        try {
            $bytes = random_bytes(10);
        } catch (Exception $e) {
            $bytes = openssl_random_pseudo_bytes(10);
        }
        return bin2hex($bytes);
    }

}