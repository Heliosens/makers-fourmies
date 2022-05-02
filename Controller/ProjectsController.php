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
    public function page($option){
        // get selected projects
        $data = [
            'project' => ProjectsManager::oneProject($option)
        ];
        $this->render('project', $data);
    }

}