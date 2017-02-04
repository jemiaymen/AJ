<?php
namespace AJ\Core\Lib\Acl;

class Cookie {

    private $name;
    private $domain;
    private $expire;
    private $path;
    private $secure;
    private $httponly;

    public function __construct(){
        $this->name = $GLOBALS["config"]["auth"]["cookie"]["name"];
        $this->domain = $GLOBALS["config"]["auth"]["cookie"]["domain"];
        $this->expire = $GLOBALS["config"]["auth"]["cookie"]["expire"];
        $this->path = $GLOBALS["config"]["auth"]["cookie"]["path"];
        $this->secure = $GLOBALS["config"]["auth"]["cookie"]["secure"];
        $this->httponly = $GLOBALS["config"]["auth"]["cookie"]["httponly"];
    }

    public function set($val){
        setcookie($this->name,$val,time() + $this->expire ,$this->path,$this->domain,$this->secure,$this->httponly);
    }

    public function get(){
        if(isset($_COOKIE[$this->name])){
            return $_COOKIE[$this->name];
        }
        return NULL;
    }

    public function destroy(){
        setcookie($this->name,"",time() - $this->expire ,$this->path,$this->domain,$this->secure,$this->httponly);
    }
}