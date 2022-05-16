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
    }

    /**
     * clean user entries
     * @param $param
     * @return string
     */
    public function cleanEntries ($param){
        return trim(strip_tags($_POST[$param]));
    }

    /**
     * clean string
     * @param $item
     * @return string
     */
    public function cleanItem ($item){
        return trim(strip_tags($item));
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
     * test if current user is authorized function of provided array
     * @param array $authorized
     * @return bool
     */
    public function testAccess(array $authorized){
        return in_array($_SESSION['user']['role'], $authorized);
    }

    /**
     * continue if user is connected or display home page
     * $bool = false switch result
     * bool
     * @param $bool
     */
    public function connectedKeepGoing($bool){
        // if session and bool = 1 or if !session and bool = 0
        if(!$this->userIsConnected() && $bool || $this->userIsConnected() && !$bool){
            header('Location: index.php');
        }
    }

    /**
     * @return bool
     */
    private function userIsConnected (){
        return isset($_SESSION['user']);
    }

    /**
     * @return string
     */
    public function createRandomName (): string {
        try {
            $bytes = random_bytes(10);
        } catch (Exception $e) {
            $bytes = openssl_random_pseudo_bytes(10);
        }
        return bin2hex($bytes);
    }
}