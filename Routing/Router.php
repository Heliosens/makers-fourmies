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
        $o = is_numeric($o) ? intval($o) : null;

        if(class_exists($ctrl)){
            $controller = new $ctrl;
            if(method_exists($controller, $p)){
                $controller->$p($o);
            }
            else{
                $this->error();
            }
        }
        else{
            $this->error();
        }
    }

    /**
     * create error controller & display page 404
     */
    public static function error (){
        $controller = new ErrorController();
        $controller->page();
    }

}