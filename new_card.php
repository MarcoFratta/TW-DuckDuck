<?php
    require_once "utils/functions.php";
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "bootstrap.php";

    $templateParams['title'] = "Nuova carta";
    $templateParams['header_title'] = "Nuova carta";
    $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/new_card.css?'.time().'" />'];
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    require "template/new_card_template.php";
    require "template/footer.php";
    require "template/common_bottom_html.php"
?>
