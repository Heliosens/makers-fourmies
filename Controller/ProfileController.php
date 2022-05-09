<?php


class ProfileController extends Controller
{
    /**
     * display profile data
     * @param $id
     */
    public function profile($id){
        $data = ['user' => UserManager::getUserById($id)];
        $this->render('profile', $data);
    }

    /**
     * @param $id
     */
    public function admin($id){
        if($_SESSION['role'] === 'admin'){
            $data = [
                'user' => UserManager::allUser(),
                'article' => ProjectsManager::AllArticle(),
//                'rubric' =>
            ];
            $this->render('admin', $data);
        }
    }
}