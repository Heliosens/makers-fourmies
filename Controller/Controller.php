<?php


class Controller
{
    /**
     * @param string $page
     * @param array $data
     */
    public function render(string $page, array $data = []){
        $categories = ['item' => Manager::getCategories()];
        require __DIR__ . '/../View/partials/header.php';
        require __DIR__ . '/../View/' . $page . '.php';
        require __DIR__ . '/../View/partials/footer.php';
    }

//    /**
//     * @param $ctrl
//     * @return string
//     */
//    public function cleanCtrl ($ctrl){
//        return trim(strtolower(strip_tags($_POST[$ctrl])));
//    }



}