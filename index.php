<?php

  require_once "db/connections.php";
  require_once "db/database.php";
  require_once "utils/functions.php";
  require_once "bootstrap.php";
 

  $templateParams['title'] = "Home";
  $templateParams['scripts'] = [
  '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>',
  '<script src="js/size_selector.js"></script>'];
  $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/small_products.css?'.time().'" />'];
  require "template/common_top_html.php";
  require "template/header.php";
  $db = DbConnections::mySqlConnection();
  $new_products = $db->products()->getLastNormalProducts();
  $discount_products = $db->products()->getNormalProductsWithDiscount();
  require "template/home.php";
  require "template/footer.php";
  require "template/common_bottom_html.php";
  
