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
                'write' => ArticleManager::artByAuthor($id),
                ]
        ];
        $this->render('profile', $data);
    }

    /**
     * admin space if user is admin
     */
    public function admin(){
        if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'){
            $data = [
                'user' => UserManager::allUser(),
                'article' => [
                    'pr' => ArticleManager::artByState('1'),
                    'sb' => ArticleManager::artByState('2'),
                    'pu' => ArticleManager::artByState('3'),
                ],
            ];
            $this->render('admin', $data);
        }
        else $this->render('home');
    }

}