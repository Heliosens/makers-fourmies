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
     * check if fields exist and not empty if submit button is pressed
     * @param string ...$fields
     * @return bool
     */
    public function fieldsState (string ...$fields) : bool
    {
        foreach ($fields as $item){
            if(!isset($_POST[$item]) || empty($_POST[$item])){
                $_SESSION['error'] = "Les champs obligatoires doivent être remplis !";
                return false;
            }
        }
        return true;
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
     * test if current user is authorized
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
     * continue if user is connected or display home page
     * $bool = false switch result
     * bool
     * @param $bool
     */
    public function userConnectionExist($bool){
        // if session and bool = 1 or if !session and bool = 0
        if(!isset($_SESSION['user']) && $bool || isset($_SESSION['user']) && !$bool){
            $this->render('home');
        }
    }


}