<?php
require_once "db/connections.php";
require_once "db/database.php";
require_once "utils/functions.php";
require_once "bootstrap.php";
if (userIsLogged()) {
    if (isSeller()) {
        $templateParams['title'] = "Prodotti";
        require "template/common_top_html.php";
        require "template/header.php";
        $db = DbConnections::mySqlConnection();
        $seller_id = $_SESSION['id'];
        require "template/seller_products.php";
        require "template/common_bottom_html.php";
    } else {
        die("Accesso negato");
    }
} else {
    header("Location:login.php?type=seller");
}
