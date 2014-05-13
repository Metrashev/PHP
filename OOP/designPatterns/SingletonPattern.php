<?php

//Сингълтона ни позволява да имаме една единствена инстанция в класа
class DB {

    private static $instance = NULL;
    private $tableName;
    
    public function getTableName() {
        return $this->tableName;
    }

    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }

    
        public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new DB();
        }
        return self::$instance;
    }
}

$connecion = DB::getInstance();
$connecion->setTableName('Godji');
echo $connecion->getTableName();
//var_dump($connecion);