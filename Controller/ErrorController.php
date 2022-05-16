<?php


class ErrorController extends Controller
{
    /**
     * error
     */
    public function page(){
        $this->render('page404');
    }

    /**
     * missing validation by mail
     */
    public function token(){
        $this->render('token');
    }
}