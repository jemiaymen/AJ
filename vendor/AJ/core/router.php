<?php
namespace AJ\Core;

class Router{

    private $controller ;
    private $action ;
    private $param ;
    private $uri ;
    private $a ;
    private $method ;
    private $req ;

    public function __construct(){
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->req = $_REQUEST;
        $this->a = explode("/",ltrim($this->uri,"/"));

        $this->controller = ucfirst($GLOBALS["config"]["default"]["controller"]);
        $this->action = $GLOBALS["config"]["default"]["action"];

        if($this->isValidUri()){
            $this->controller = ucfirst($this->a[0]);
            $this->action = $this->a[1];
        }

        if($this->isParams()){
            $this->param = array_slice($this->a,2);
        }
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getParams(){
        return $this->param;
    }

    public function isValidUri(){
        return count($this->a) > 1 && $this->a[0] != '' && $this->a[1] != '';
    }

    public function isParams(){
        return count($this->a) > 2;
    }

    public function getMethod(){
        return $this->method;
    }

    public function getReq(){
        if (!empty($this->req) ){
            return $this->req;
        }
        return NULL;
    }
}
