<?php

class DbManager {

    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPassword;
    private $dbConn;

    public function __construct(){
        include_once('../external_includes/mysql_settings.php');
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        $this->establishConn();
        
    }

    public function __destruct(){
        $this->dbConn->close();
    }

    private function establishConn(){
        $this->dbConn = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if( $this->dbConn->connect_error) {
            die('Could not connect: ' . $dbConn->connect_error );
        }
    }

    public function execute($sql){
        if($this->dbConn->query($sql)){
            return true;
        }
        else{
            echo 'Błąd podczas zapisywania wpisu '.'('.$this->dbConn->errno.')';
            return false;
        }
    }

    public function selectLastId($tableName){
        $result = $this->dbConn->query("SELECT MAX(id) FROM {$tableName}");
        return $result->fetch_assoc()['MAX(id)'];
    }

    public function selectAll($tableName){
        $ar = array();
        $result = $this->dbConn->query("SELECT * FROM {$tableName}");
        while($row = $result->fetch_assoc()){
            array_push($ar, $row);
        }
        $result->free();
        return $ar;
        
    }

    




}



?>