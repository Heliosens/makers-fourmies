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

    /**
     * @param $ctrl
     * @return string
     */
    public function getCtrlName ($ctrl){
        return ucfirst($ctrl) . 'Controller';
    }

    /**
     * @param $c
     * @param $p
     * @param $o
     */
    public function toCtrl ($c, $p, $o){
        $ctrl = $this->getCtrlName($c);
        $p = self::cleanParam($p);
        $o = self::cleanParam($o);
        $controller = new $ctrl;
        if(null !== $p){
            $controller->$p($o);
        }
    }

}