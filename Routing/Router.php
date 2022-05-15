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
     * get parameters, get instance of controller
     * @param $c
     * @param $p
     * @param $o
     */
    public function toCtrl ($c, $p, $o){
        $ctrl = $this->getCtrlName($c);
        $p = self::cleanParam($p);
        $o = self::cleanParam($o);

        if(class_exists($ctrl)){
            $controller = new $ctrl;
            if(method_exists($controller, $p)){
                $controller->$p($o);
            }
            else{
                $controller = new ErrorController();
                $controller->page();
            }
        }
        else{
            $controller = new ErrorController();
            $controller->page();
        }
    }

}