<?php
    require_once "bootstrap.php"; 
    require_once "utils/functions.php";
    if (userIsLogged()) {
        require_once "db/connections.php";
        require_once "db/database.php";
        require_once "db/users_db.php";
        require_once "model/client.php";
        require_once "model/card.php";
        require_once "model/order.php";
        require_once "model/address.php";
        require_once "model/product.php";
        require_once "model/notification.php";

        $templateParams['title'] = "Acquisto completato";
        require "template/common_top_html.php";
        require "template/header.php";
        $db = DbConnections::mySqlConnection();
        $_SESSION['card'] = $_POST['card'];
        require "template/completed_template.php";
        require "template/footer.php";
        require "template/common_bottom_html.php";
    } else {
        header("Location:login.php?type=client");
    }

?>