<?php

  require_once "db/connections.php";
  require_once "db/database.php";
  require_once "utils/functions.php";
  require_once "bootstrap.php";
 

  
  if (!isset($_GET['type'])){
      die("Errore tipo");
  }
  $db = DbConnections::mySqlConnection();
  $type = $_GET['type'];
  if(userIsLogged()){
    if(isSeller()){   
        if($type == "normal") {
            $templateParams['title'] = "Aggiungi Prodotto";
            require "template/common_top_html.php";
            require "template/header.php";
            require "template/new_product.php";
        } elseif ($type == "item"){
            $templateParams['title'] = "Aggiungi Elemento";
            require "template/common_top_html.php";
            require "template/header.php";
            require "template/new_item.php";
        }  else {
            header("Location:login.php?type=client");   
        }   
    } elseif(isClient()){
        if($type == "custom") {
            $templateParams['title'] = "Crea un prodotto";
            $templateParams['scripts'] = ['<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>',
            '<script src="js/create_custom.js"></script>'];
            require "template/common_top_html.php";
            require "template/header.php";
            require "template/create_custom.php";
        } else {
            header("Location:login.php?type=seller");
        }
    }
    require "template/common_bottom_html.php";
} else {
    if ($type == "custom"){
        $templateParams['title'] = "Crea un prodotto";
        $templateParams['scripts'] = ['<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>',
        '<script src="js/create_custom.js"></script>'];
        require "template/common_top_html.php";
        require "template/header.php";
        require "template/create_custom.php";
        require "template/common_bottom_html.php";
    } else {
        header("Location:login.php?type=seller");
    }
}
