<?php

use AJ\Core\Controller ;


class HomeController extends Controller{

    public function index(){
        return $this->template->render('home.html.twig',$GLOBALS["config"]["framwork"]);
    }

    public function ru($id){
        return "method ru with $id";
    }
}