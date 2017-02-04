<?php

namespace AJ\Core;

require_once "loader.php";

class Controller {


    protected $template;
    protected $loader;

    public function __construct(){
        $this->template = $GLOBALS["template"];
        $this->loader = new Loader;
    }
}