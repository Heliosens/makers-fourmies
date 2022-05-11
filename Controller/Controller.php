<?php


class Controller
{
    /**
     * @param string $page
     * @param array $data
     */
    public function render(string $page, array $data = []){
        $tech = ['technic' => TechnicManager::allTechnique()];
        require __DIR__ . '/../View/partials/header.php';
        require __DIR__ . '/../View/' . $page . '.php';
        require __DIR__ . '/../View/partials/footer.php';
    }

    /**
     * @param $param
     * @return string
     */
    public function cleanEntries ($param){
        return trim(strip_tags($_POST[$param]));
    }

    /**
     * check if fields exist and not empty
     * @param string ...$fields
     * @return bool
     */
    public function fieldsState (string ...$fields) : bool
    {
        foreach ($fields as $item){
            if(!isset($item) || empty($item)){
                $_SESSION['error'] = "Tous les champs doivent être remplis !";
                return false;
            }
        }
        return true;
    }

    /**
     * @param $param
     * @return string
     */
    public static function roleName($param){
        switch ($param){
            case 'admin' :
                return'Administrateur';
                break;
            case 'modo' :
                return 'Modérateur';
                break;
            case 'user' :
                return 'Utilisateur';
                break;
            default :
                return 'Unknown';
        }
    }

    /**
     * @param $param
     * @return string|null
     */
    public static function stateName($param){
        switch ($param){
            case 1 :
                return 'Privé';
                break;
            case 2 :
                return 'En attente de validation';
                break;
            case 3 :
                return 'Publié';
                break;
            default :
                return null;
        }
    }

    /**
     * test if there's one admin at least
     * @return bool
     */
    public function testAdmin (){
        $admin = UserManager::adminNbr();
        return $admin['nbr'] > 1;
    }

    /**
     * test if current user exist and is authorized
     * @param int $currentUserId
     * @param array $authorized
     */
    public function testAccess(int $currentUserId, array $authorized){
        $role = UserManager::getRoleByUser($currentUserId);
        if(!in_array($role, $authorized)){
            $this->render('home');
        }
    }

    /**
     * test if user is connected
     */
    public function userConnectionExist($bool){
        // if session and bool = 1
        if(!isset($_SESSION['user']) && $bool){
            $this->render('home');
        }
        // if !session and !bool = 1
        if (isset($_SESSION['user']) && !$bool){
            $this->render('home');
        }
    }
}