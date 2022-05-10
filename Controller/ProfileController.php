<?php


class ProfileController extends Controller
{
    /**
     * display profile data
     * @param $id
     */
    public function profile(){
        $data = ['user' => UserManager::getUserById($_SESSION['user']['id'])];
        $this->render('profile', $data);
    }

    /**
     * admin space
     */
    public function admin(){
        if($_SESSION['user']['role'] === 'admin'){
            $rubrics = RubricManager::allRubrics();
            $data = [
                'user' => UserManager::allUser(),
                'article' => [
                    'pr' => ProjectsManager::artByState('1'),
                    'sb' => ProjectsManager::artByState('2'),
                    'pu' => ProjectsManager::artByState('3'),
                ],
            ];
            foreach ($rubrics as $key => $value){
                $data['rubrics'][] = [
                    $key => $value
                ];
            }
            $this->render('admin', $data);
        }
    }
}