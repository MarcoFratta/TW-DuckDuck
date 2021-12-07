<?php
    require_once "db/connections.php";
    require_once "utils/functions.php";
    require_once "template/common_html.php";

    $templateParams['title'] = "Prodotto";
    echo withBody(function (){
      require "template/header.php";
      $db = DbConnections::mySqlConnection();
      $selected_product_id = $_GET['id_product'];
      $product = $db->products()->getProductById($selected_product_id);
      require "template/product_big.php";
    }, $templateParams);
?>
