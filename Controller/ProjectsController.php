<?php


class ProjectsController extends Controller
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
            'projects' => ProjectsManager::projectByTechnic($option),
            'title' => TechnicManager::techName($option)
            ];
        $this->render('project_by_tech', $data);
    }

    /**
     * @param $option
     */
    public function one_project ($option){
        // get selected projects
        $data = [
            'project' => ProjectsManager::oneProject($option)
        ];

        $this->render('project', $data);
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
        $cat = $this->fieldsState('cat') ? $_POST['cat'] : null;

        $article = new Article();
        $article
            ->setTitle($title)
            ->setDescription($description)
            ->setType($type)
            ->setCategory($cat)
            ->setAuthor($author);

        echo '<pre>';
            var_dump($_POST);
        echo '</pre>';
        // if step => title require
    }

}