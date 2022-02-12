<?php

require_once "db/connections.php";
require_once "db/database.php";
require_once "model/category.php";
require_once "utils/functions.php";
require_once "template/common.php";
require_once "bootstrap.php";

$db = DbConnections::mySqlConnection();

$templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/vertical_products.css?'.time().'" />',
'<link rel="stylesheet" type="text/css" href="./css/small_products.css?'.time().'" />'];
$templateParams['scripts'] = [
    '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>',
    '<script src="js/size_selector.js"></script>',
    '<script src="js/filters.js"></script>',
    '<script src="js/common.js"></script>'];

if(isset($_GET['category'])){
    $category = $db->categories()->getCategoryById($_GET['category']);
    if(!$category){
        die(displayError("categoria non trovata"));
    }
    if(isset($_POST['filter'])) {
        if($_POST['filter'] == 'alpha') {
            $products = $db->products()->getProductsByCategoryAlpha($category->getId());
            
        } elseif ($_POST['filter'] == 'omega') {
            $products = $db->products()->getProductsByCategoryOmega($category->getId());
        } elseif ($_POST['filter'] == 'cPrice') {
            $products = $db->products()->getProductsByCategoryCPrice($category->getId());
        } elseif ($_POST['filter'] == 'dPrice') {
            $products = $db->products()->getProductsByCategoryDPrice($category->getId());
        } elseif ($_POST['filter'] == 'cDim') {
            $products = $db->products()->getProductsByCategoryCDim($category->getId());
        } elseif ($_POST['filter'] == 'dDim') {
            $products = $db->products()->getProductsByCategoryDDim($category->getId());
        }
        $title = $category->getName();
    } else {
        $products = $db->products()->getProductsByCategory($category->getId());
        $title = $category->getName();
    }
} elseif(isset($_GET['new_products'])){
    $products = $db->products()->getLastNormalProducts();
    $title = "Nuovi arrivi";
}elseif(isset($_GET['discounted'])){
    $products = $db->products()->getNormalProductsWithDiscount();
    $title = "In sconto";
} else {
    die(displayError("non trovato"));
}

$templateParams['title'] = $title;
$templateParams['header_title'] = $title;

require "template/common_top_html.php";
require "template/header.php";

if(!$products){
    echo displayError("nessuno prodotto trovato");
} else {
    $products = toArray($products);
    if(sizeof($products) == 0){
        echo displayError("nessuno prodotto trovato");
    }else{
        require "template/vertical_products.php";
    }
    
}
require "template/footer.php";
require "template/common_bottom_html.php";
