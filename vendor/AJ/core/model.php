<?php
namespace AJ\Core;

class Model {
    
    protected $db;

    public function __construct(){
        $this->db = $GLOBALS["em"];
    }
}