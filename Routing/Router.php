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
     * controller name
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
    public function toCtrl ($c, $p, $o, $t){
        $ctrl = $this->getCtrlName($c);
        $p = $this->paramCase($p);
        if(class_exists($ctrl)){
            $controller = new $ctrl;
            if(method_exists($controller, $p)){
                $controller->$p($o, $t);
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
        $ctrl = new ErrorController();
        $ctrl->render('page404');
    }

    /**
     * set param in camelCase
     * @param $param
     * @return string
     */
    private function paramCase ($param){
        $name = "";
        if(isset($param)){
            $value = explode("_", $param);

            foreach ($value as $item){
                $name .= ucfirst($item);
            }
        }
        return lcfirst($name);
    }

}