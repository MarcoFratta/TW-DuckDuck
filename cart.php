<?php
    require_once "db/connections.php";
    require_once "db/database.php";
    require_once "utils/functions.php";
    require_once "bootstrap.php";
    require_once "template/common_html.php";
  
    $templateParams['title'] = "Carrello";
    echo withBody(function (){
      require "template/header.php";
      $db = DbConnections::mySqlConnection();
      require "template/cart_template.php";
      // footer
    }, $templateParams);


?>