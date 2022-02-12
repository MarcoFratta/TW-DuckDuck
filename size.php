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
    $templateParams['header_title'] = "Dimensioni";
    $templateParams['scripts'] = ['<script src="js/size_selector.js"></script>'];
    $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/size_selector.css?'.time().'" />',
    '<link rel="stylesheet" type="text/css" href="./css/dimensions.css?'.time().'" />'
    ];
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    $dimension = $db->products()->getDimensionBySize($size);
    require "template/size_template.php";
    require "template/footer.php";
    require "template/common_bottom_html.php";
