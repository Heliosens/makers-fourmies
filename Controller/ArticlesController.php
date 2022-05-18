<?php


class ArticlesController extends Controller
{

    public function all_articles(){
        $data = ['art' => ArticleManager::allPuArticles()];
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
        $stepController = new StepController();
        $steps = $stepController->addStep();   // if step => title is required

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
            header('Location: index.php?c=articles&p=all_articles&o=' . $id);
        }
    }

}