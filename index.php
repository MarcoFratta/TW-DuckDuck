<?php

  require_once "db/connections.php";
  require_once "db/database.php";
  require_once "utils/functions.php";
  require_once "bootstrap.php";
 

  $templateParams['title'] = "Home";
  require "template/common_top_html.php";
  require "template/header.php";
  $db = DbConnections::mySqlConnection();
  require "template/horizontal_products.php";
  require "template/common_bottom_html.php";
