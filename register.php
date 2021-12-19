<?php

$username = $_POST['username'];
$password = $_POST['password'];

if(!isset($password) || !isset($username))
    exit('Errore');

require_once "db/database.php";
require_once "db/connections.php";
require_once "functions.php";

// database connection 
$db = DbConnections::mySqlConnection();

// creating and executing the query

// returning the new page



?>