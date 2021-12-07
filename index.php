<?php

  require_once "db/connections.php";
  require_once "db/database.php";
  require_once "utils/functions.php";
  require_once "bootstrap.php";
  require_once "template/common_html.php";

  $templateParams['title'] = "Home";
  echo withBody(function (){
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    require "template/horizontal_products.php";
  }, $templateParams);
?>
