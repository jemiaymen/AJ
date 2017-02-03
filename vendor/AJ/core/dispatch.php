<?php
namespace AJ\Core;

require_once "router.php";

class Dispatch {

    private $router ;

    public function __construct(){
        $this->router = new Router ;
    }

    public function handler(){
        if($this->router->getMethod() =="GET"){
            $this->run();
        }elseif($this->router->getMethod() =="POST"){
            $this->run($this->router->getReq());
        }else{
            echo "HttpMethod Not Allowed !";
        }
    }

    private function run($q = NULL){
        $class = $this->router->getController() . "Controller";
        if (class_exists($class)){
            $run = new $class;
            $action = $this->router->getAction();
            if(method_exists($run,$action)){
                if($this->router->isParams()){
                    $p = $this->router->getParams();
                    if($q){
                        echo $run->$action($p[0],$q);
                    }else {
                       echo $run->$action($p[0]); 
                    }
                }else {
                    if($q){
                        echo $run->$action($q);
                    }else {
                       echo $run->$action(); 
                    }
                }
            }else {
                echo "Error Action Not Found !";
            }  
        }else{
            echo "Error Controller Not Found !";
        }    
    }

}

