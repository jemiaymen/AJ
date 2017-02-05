<?php
namespace AJ\Core\Lib\Acl;

class Cli {

    private $aclsql;
    private $acl;
    private $roles;

    public function __construct(){
        $this->acl = $GLOBALS["config"]["auth"]["acl"];
        $this->roles = explode(";",str_replace(" ","",$GLOBALS["config"]["auth"]["acl"]["roles"])) ;
    }

    public function run(){
        $this->generate();
        $this->execute();
    }

    private function generate(){
        $this->aclsql = file_get_contents( $GLOBALS["lib"] . "/acl/template");
        $this->aclsql = str_replace("user(",$this->acl["db"] . " (",$this->aclsql);
        if(!empty($this->acl["additional"]) ){
            foreach($this->acl["additional"] as $key => $val){
                $type = $val["type"];
                $tail = $val["tail"];
                $nullable = $val["nullable"];
                $index = $val["index"];
                $re = "$key $type($tail)";
                if($index){
                    $re .= " $index";
                }

                if(!$nullable){
                    $re .= " not null";
                }

                $this->aclsql .= ",\n  $re";
            }
        }
        $this->aclsql .= ",\n  role ENUM " . "('".implode("','",$this->roles)."' ) not null" ;

        $this->aclsql .= " )";
    }

    private function execute(){
        $GLOBALS["em"]->getConnection()->exec( $this->aclsql );
    }

}