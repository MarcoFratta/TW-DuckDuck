<?php
    echo "ciao";
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "db/products_db.php";
    require_once "utils/functions.php";
    require_once "bootstrap.php";

    require "template/base.php";
    $db = DbConnections::mySqlConnection();
    $products = $db->products()->getRandomProducts(2);
    require "template/horizontal_products.php";
   
?>