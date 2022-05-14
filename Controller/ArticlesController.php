<?php


class ArticlesController extends Controller
{

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
        // get selected projects
        $data = [
            'article' => ArticleManager::oneArticle($option)
        ];

        $this->render('article', $data);
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
            header('Location: index.php?c=projects&p=art_form');
        }

        $title = $this->cleanEntries('artTitle');
        $description = $this->cleanEntries('artDescription');
        $author = UserManager::getUserById($_SESSION['user']['id']);
        $type = $this->fieldsState('type') ? TypeManager::getTypeById($_POST['type']) : null;
        $state = StateManager::stateByName('pr');
        $cat = $this->fieldsState('cat') ? $_POST['cat'] : null;
        $step = null;   // if step => title require

        $article = new Article();
        $article
            ->setTitle($title)
            ->setDescription($description)
            ->setStep($step)
            ->setType($type)
            ->setState($state)
            ->setCategory($cat)
            ->setAuthor($author);

        if(ArticleManager::addArticle($article)){
            header('Location: index.php?c=profile');
        }
//        echo '<pre>';
//            var_dump($_POST);
//        echo '</pre>';

    }
}