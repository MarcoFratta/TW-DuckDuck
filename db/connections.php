<?php
require_once "database.php";
class DbConnections{

    public static function mySqlConnection(){
        return new DbHelper("localhost", "root", "", "rubber_shop");
    }
}
?>