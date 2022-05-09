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
    public function admin(){
        if($_SESSION['role'] === 'admin'){
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