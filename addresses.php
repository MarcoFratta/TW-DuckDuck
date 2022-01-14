<?php
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "bootstrap.php";
  
    $templateParams['title'] = "Indirizzi";
    require "template/common_top_html.php";
    //require "template/header.php";
    $db = DbConnections::mySqlConnection();
    require "template/address_template.php";
      // footer
    require "template/common_bottom_html.php";
