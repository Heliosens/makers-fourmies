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
     * @param $test
     */
    public function testParam ($test){
        if($test){
            $this->render('404page');
        }
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

}