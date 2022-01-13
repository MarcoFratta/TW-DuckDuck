<?php
 
require_once "bootstrap.php"; 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "db/users_db.php";
    require_once "model/client.php";
    require_once "utils/functions.php";  


    $templateParams['title'] = "Dettagli account";
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    require "template/client_details.php";
    require "template/common_bottom_html.php";
} else {
    header("Location:login.php?type=client");
}


?>