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
     * @param $param
     * @return string
     */
    public static function cleanOption ($param){
        $id = intval(trim(strip_tags($param)));
        if(filter_var($id, FILTER_VALIDATE_INT)) {
            return $id;
        }
        return self::cleanParam($param);
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
        $controller = new $ctrl;
        $controller->$p($o);
    }

    /**
     * create error controller & display page 404
     */
    public static function error (){
        $ctrl = new ErrorController();
        $ctrl->render('page404');
    }

}