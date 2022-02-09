<?php
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "utils/functions.php";
    require_once "bootstrap.php";
    $templateParams['header_title'] = "Carrello";
    $templateParams['title'] = "Carrello";
    $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/cart_products.css?'.time().'" />'];
    $templateParams['scripts'] = ['<script src="js/size_selector.js"></script>'];
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    require "template/cart_template.php";
    require "template/footer.php";
    require "template/common_bottom_html.php";
