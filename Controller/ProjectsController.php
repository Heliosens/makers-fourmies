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
            'type' => TypeManager::getAllName('type'),
            'category' => CategoryManager::getAllName('category'),
            'technique' => TechnicManager::getAllName('technique'),
        ];
        $this->render('art_form', $data);
    }

    /**
     *
     */
    public function add_art (){
        $data = [];

        $this->render('404page', $data);
    }


}