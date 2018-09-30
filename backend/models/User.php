<?php

class User{
    private $name;
    private $surrname;
    private $image;

    public function __construct($name, $surrname, $image){
        $this->name = $name;
        $this->surrname = $surrname;
        $this->image = $image;
        
    }

    public function setSurrname($surrname){
        $this->surrname = $surrname;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function toString() {
        return "Name: {$this->name} Surrname: {$this->surrname}";
    }

    public function parseInsertQuery($tableName){
        return "INSERT INTO {$tableName} (name, surrname, image) VALUES ('{$this->name}', '{$this->surrname}', '{$this->image}')";

    }

    

}

?>