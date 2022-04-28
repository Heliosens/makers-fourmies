<?php


class Router
{
    /**
     * @param $param
     * @return string
     */
    public static function cleanParam ($param){
        return trim(strtolower(strip_tags($_POST[$param])));
    }

}