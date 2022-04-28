<?php


class HomeRouter extends Router
{
    public static function route(?string $param = null){
        (new HomeController())->view();
    }
}