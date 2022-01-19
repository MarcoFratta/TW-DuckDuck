<?php
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "utils/functions.php";
    require_once "model/dimension.php";
    require_once "bootstrap.php";

    if (!isset($_GET['size'])){
        $size = 1; // default size if not set (1)
    } else{
        $size = $_GET['size'];
    }
    
    $templateParams['title'] = "Dimensioni";
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    $dimension = $db->products()->getDimensionBySize($size);
    require "template/size_template.php";
        // footer
    require "template/common_bottom_html.php";
