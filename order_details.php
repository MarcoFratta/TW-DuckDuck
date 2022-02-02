<?php
require_once "bootstrap.php";
require_once "utils/functions.php";
require_once "db/connections.php";
require_once "model/order.php";
require_once "model/product.php";
require_once "model/address.php";
if (userIsLogged() && isClient()) {
    $templateParams['title'] = "Dettagli ordine";
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    $_SESSION['id_order_details'] = $_POST['order_details'];
    require "template/order_details_template.php";
    require "template/footer.php";
    require "template/common_bottom_html.php";
} else {
    header("Location:login.php?type=client");
}
