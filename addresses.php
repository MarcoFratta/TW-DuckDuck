<?php
    require_once "bootstrap.php"; 
    require_once "utils/functions.php";
    if (userIsLogged()) {
        require_once "db/connections.php";
        require_once "db/database.php";
        require_once "model/address.php";

        $templateParams['title'] = "Indirizzo di consegna";
        $templateParams['header_title'] = "Indirizzo";
        $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/addresses.css?'.time().'" />'];
        require "template/common_top_html.php";
        require "template/header.php";
        $db = DbConnections::mySqlConnection();
        require "template/address_template.php";
        require "template/footer.php";
        require "template/common_bottom_html.php";
    } else {
        header("Location:login.php?type=client");
    }
?>