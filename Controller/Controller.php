<?php


class Controller
{
    /**
     * @param string $page
     * @param array $data
     */
    public function render(string $page, array $data = []){
        $tech = TechnicManager::getAllKeyName('technique');
        require __DIR__ . '/../View/partials/header.php';
        require __DIR__ . '/../View/' . $page . '.php';
        require __DIR__ . '/../View/partials/footer.php';
        exit;
    }

    /**
     * clean user entries
     * @param $param
     * @return string
     */
    public function cleanEntries ($param){
        return trim(htmlentities($_POST[$param]));
    }

    /**
     * clean string
     * @param $item
     * @return string
     */
    public function cleanItem ($item){
        return trim(htmlentities($item));
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
     * test if current user role is in provided array
     * @param array $authorized
     * @return bool
     */
    public static function testAccess(array $authorized){
        self::connectedKeepGoing(true);
        return in_array($_SESSION['user']['role'], $authorized);
    }

    /**
     * continue if user is connected or display home page
     * $bool = false switch result
     * bool
     * @param $bool
     */
    public static function connectedKeepGoing($bool){
        // if session and bool = 1 or if !session and bool = 0
        if(!isset($_SESSION['user']) && $bool || isset($_SESSION['user']) && !$bool){
            header('Locator: index.php');
            exit;
        }
    }

    /**
     * @param $size
     * @return string
     */
    public function createRandomName ($size): string {
        try {
            $bytes = random_bytes($size);
        } catch (Exception $e) {
            $bytes = openssl_random_pseudo_bytes($size);
        }
        return bin2hex($bytes);
    }

    /**
     * @param $currentImg
     * @return bool
     */
    public function testMimeType ($currentImg){
        $allowed = ['image/jpeg', 'image/jpg', 'image/png'];  // allowed mime type
        return in_array(mime_content_type($currentImg), $allowed);
    }

    /**
     * get url option and return array
     * @param $option
     * @return false|string[]
     */
    public function getOption($option){
        return explode("_", $option);
    }

}