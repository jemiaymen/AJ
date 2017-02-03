<?php

namespace AJ\Core;

class Controller {


    protected $template;

    public function __construct(){
        $this->template = $GLOBALS["template"];
    }
}