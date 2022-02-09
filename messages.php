<?php
    require_once "bootstrap.php";
    require_once "utils/functions.php";
    if (userIsLogged()) {
        require_once "db/connections.php";
        require_once "db/database.php";
        require_once "model/notification.php";
        require_once "utils/functions.php";

        $templateParams['title'] = "Messaggi";
        $templateParams['header_title'] = "Notifiche";
        $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/order.css?'.time().'" />'];
        require "template/common_top_html.php";
        require "template/header.php";
        $db = DbConnections::mySqlConnection();
        require "template/notifications_template.php";
        require "template/footer.php";
        require "template/common_bottom_html.php";
    } else {
        header("Location:login.php?type=client");
    }
?>