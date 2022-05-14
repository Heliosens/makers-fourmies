<?php


class ProfileController extends Controller
{
    /**
     * display user profile data
     */
    public function page(){
        $id = $_SESSION['user']['id'];
        $data = [
            'user' => UserManager::getUserById($id),
            'avatar' => AvatarManager::getAllAvatar(),
            'art' => [
                'write' => ProjectsManager::artByAuthor($id),
                ]
        ];
        $this->render('profile', $data);
    }

    /**
     * admin space
     */
    public function admin(){
        if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'){
            $data = [
                'user' => UserManager::allUser(),
                'article' => [
                    'pr' => ProjectsManager::artByState('1'),
                    'sb' => ProjectsManager::artByState('2'),
                    'pu' => ProjectsManager::artByState('3'),
                ],
            ];
            $this->render('admin', $data);
        }
        else $this->render('home');
    }
}