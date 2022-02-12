<?php
require_once "db/connections.php";
require_once "utils/functions.php";
require_once "template/common.php";

$templateParams['title'] = "Prodotto";
$templateParams['header_title'] = "Prodotto";
$templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/product_big.css?'.time().'" />'];
require "template/common_top_html.php";
require "template/header.php";
if(!isset($_GET['id_product'])){
    die(displayError("errore"));
}
$db = DbConnections::mySqlConnection();
$selected_product_id = $_GET['id_product'];
$product = $db->products()->getNormalProductById($selected_product_id);
if(!$product){
    echo (displayError("Prodotto non trovato"));
} else{
    require "template/product_big.php";
}

require "template/footer.php";
require "template/common_bottom_html.php";?>
