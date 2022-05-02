<?php


class UserController extends Controller
{
    public function register (){
        $this->render('register');
    }

    public function connection (){
        $this->render('connection');
    }
}