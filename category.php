<?php

require_once "db/connections.php";
require_once "db/database.php";
require_once "model/category.php";
require_once "utils/functions.php";
require_once "bootstrap.php";

$db = DbConnections::mySqlConnection();
$templateParams['scripts'] = [
    '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>',
    '<script src="js/size_selector.js"></script>'];

if(isset($_GET['category'])){
    $category = $db->categories()->getCategoryById($_GET['category']);
    if(!$category){
        die("categoria non trovata");
    }
    $templateParams['title'] = $category->getName();
    $products = $db->products()->getProductsByCategory($category->getId());
    $title = $category->getName();
} elseif(isset($_GET['new_products'])){
    $products = $db->products()->getLastNormalProducts();
    $title = "Nuovi arrivi";
}elseif(isset($_GET['discounted'])){
    $products = $db->products()->getNormalProductsWithDiscount();
    $title = "In sconto";
} else {
    die("non trovato");
}




require "template/common_top_html.php";
require "template/header.php";

if(!$products){
    echo("nessuno prodotto trovato");
} else {
    $products = toArray($products);
    if(sizeof($products) == 0){
        echo("nessuno prodotto trovato");
    }else{
        require "template/vertical_products.php";
    }
    
}
require "template/footer.php";
require "template/common_bottom_html.php";
