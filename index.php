<?php

  require_once "db/connections.php";
  require_once "db/database.php";
  require_once "utils/functions.php";
  require_once "bootstrap.php";
 

  $templateParams['title'] = "Home";
  require "template/common_top_html.php";
  require "template/header.php";
  $db = DbConnections::mySqlConnection();
  $new_products = $db->products()->getLastNormalProducts();
  $discount_products = $db->products()->getNormalProductsWithDiscount();
  require "template/home.php";
  require "template/footer.php";
  require "template/common_bottom_html.php";
  
