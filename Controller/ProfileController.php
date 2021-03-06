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
            'art' => ArticleManager::artByAuthor($id),
        ];
        $this->render('profile', $data);
    }

    /**
     * admin space if user is admin
     */
    public function admin(){
        if(self::testAccess(['admin'])){
            $data = [
                'user' => UserManager::allUser(),
                'articles' => [
                    '1' => ArticleManager::artByState('1'),
                    '2' => ArticleManager::artByState('2'),
                    '3' => ArticleManager::artByState('3'),
                ],
                'rubrics' => [
                    'type' => Manager::getAllKeyName('type'),
                    'category' => Manager::getAllKeyName('category'),
                    'technique' => Manager::getAllKeyName('technique'),
                    'resource' => ResourceManager::getKeyNameCatLink()
                    ],
                'cat-link' => ResourceManager::allCatLink()
            ];
            $this->render('admin', $data);
        }
        else $this->render('home');
    }

    /**
     * @param $id
     */
    public function profile($id){
        if(self::testAccess(['admin'])){
            $data = [
                'user' => UserManager::getUserById($id),
                'avatar' => AvatarManager::getAllAvatar(),
                'art' => ArticleManager::artByAuthor($id),
            ];
            $this->render('profile', $data);
        }
    }

}