<?php
namespace AJ\Core\Lib\Acl;
use AJ\Core\Lib\Acl\Auth;

class Acl {
    
    private $auth;
    private $roles;

    public function __construct(){
        $this->auth = new Auth;
        $this->roles = explode(";",str_replace(" ","",$GLOBALS["config"]["auth"]["acl"]["roles"])) ;
    }

    public function isAllowed(){
        
    }

    public function AllowTo($role){

    }
}