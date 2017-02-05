<?php

use AJ\Core\Controller ;
use Entity\User;

use AJ\Core\Lib\Acl\Cli ;

class HomeController extends Controller{

    public function index($id){
        if(is_numeric($id)){
            $u = new User;
            $user = $u->getUser($id);
            if($user){
                return $this->template->render('home.html.twig',array("login" => $user->getLogin(),"pw" => $user->getPw()));
            }else {
                return $this->template->render('home.html.twig',array("login" => "not found","pw" => ""));
            }
            
        }else {
           return $this->template->render('home.html.twig',$GLOBALS["config"]["framwork"]); 
        }
        
        
    }

    public function ru($id){
        return "method ru with $id";
    }

    public function home(){
        $this->loader->library("acl");
        $c = new Cli;
        $c->run();
        return "Sahite ";
    }
    
}