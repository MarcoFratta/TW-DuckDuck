<?php
    require_once "utils/functions.php";
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "bootstrap.php";

    $templateParams['title'] = "Nuova carta";
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    require "template/new_card_template.php";
        #footer
    require "template/common_bottom_html.php"
?>
