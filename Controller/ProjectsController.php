<?php


class ProjectsController extends Controller
{

    public function all_categories(){
        // display all categories names
        $this->render('categories_project');
    }

    public function page($option){
        // get category all projects


        $this->render('projects', $data);
    }

}