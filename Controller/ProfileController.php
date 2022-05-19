<?php


class ProfileController extends Controller
{
    /**
     * display user profile data
     */
    public function page(){
        $this->connectedKeepGoing(true);
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
                'articles' => [
                    '1' => ArticleManager::artByState('1'),
                    '2' => ArticleManager::artByState('2'),
                    '3' => ArticleManager::artByState('3'),
                ],
                'rubrics' => [
                    '1' => Manager::getAllKeyName('type'),
                    '2' => Manager::getAllKeyName('category'),
                    '3' => Manager::getAllKeyName('technique'),
                    '4' => ResourceManager::getKeyNameCatLink()
                    ],
                'cat-link' => ResourceManager::allCatLink()
            ];
            $this->render('admin', $data);
        }
        else $this->render('home');
    }

}