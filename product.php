<?php
require_once "db/connections.php";
require_once "utils/functions.php";

$templateParams['title'] = "Prodotto";
require "template/common_top_html.php";
require "template/header.php";
if(!isset($_GET['id_product'])){
    die("errore");
}
$db = DbConnections::mySqlConnection();
$selected_product_id = $_GET['id_product'];
$product = $db->products()->getNormalProductById($selected_product_id);
if(!$product){
    die("Prodotto non trovato");
}
require "template/product_big.php";
require "template/common_bottom_html.php";?>
