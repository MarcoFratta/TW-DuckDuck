<?php
    require_once "bootstrap.php"; 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        require_once "db/connections.php";
        require_once "db/database.php";
        require_once "utils/functions.php";  

        $templateParams['title'] = "Account";
        require "template/common_top_html.php";
        require "template/header.php";
        $db = DbConnections::mySqlConnection();
        require "template/account_template.php";
        require "template/common_bottom_html.php";
    } else {
        header("Location:login.php?type=client");
    }

?>