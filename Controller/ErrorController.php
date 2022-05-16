<?php


class ErrorController
{
    /**
     * error page
     */
    public function page (){
        $tech = TechnicManager::getAllKeyName('technique');
        require __DIR__ . '/../View/partials/header.php';
        require __DIR__ . '/../View/page404.php';
        require __DIR__ . '/../View/partials/footer.php';
    }
}