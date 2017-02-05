<?php
namespace AJ\Core;

class Model {
    
    private $db;

    public function __construct(){
        $this->db = $GLOBALS["em"];
    }

    public function db(){
        return $this->db;
    }
}