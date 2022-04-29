<?php


class Router
{
    /**
     * @param $param
     * @return string
     */
    public static function cleanParam ($param){
        return trim(strtolower(strip_tags($param)));
    }

    public function getCtrlName ($ctrl){
        return ucfirst($ctrl) . 'Controller';
    }

    public function toCtrl ($c, $p, $o){
        $ctrl = $this->getCtrlName($c);

        $controller = new $ctrl;
        if(null !== $p){
            $controller->$p($o);
        }
    }

}