<?php
namespace AJ\Core;

class Loader{

    private $libpath;
    private $helperpath;

    public function __construct(){
        $this->libpath = $GLOBALS["lib"];
        $this->helperpath = $GLOBALS["helper"];
    }

    public function library($lib){
        require_once $this->libpath . "/$lib/autoload.php";
    }

    public function helper($helper){
        require_once $this->helperpath . "/$helper/autoload.php";
    }

}