<?php


class ResourcesController extends Controller
{
    public function page(){
        $data = [
            'cat' => ResourceManager::allCatLink()
        ];
        $this->render('resources', $data);
    }
}