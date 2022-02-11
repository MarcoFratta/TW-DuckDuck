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
            $templateParams['title'] = "Aggiungi prodotto";
            $templateParams['header_title'] = "Aggiungi Prodotto";
            $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/new_element.css?'.time().'" />'];
            require "template/common_top_html.php";
            require "template/header.php";
            require "template/new_product.php";
        } elseif ($type == "item"){
            $templateParams['title'] = "Aggiungi pezzo";
            $templateParams['header_title'] = "Aggiungi Elemento";
            $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/new_element.css?'.time().'" />'];
            require "template/common_top_html.php";
            require "template/header.php";
            require "template/new_item.php";
        }  else {
            header("Location:login.php?type=client");   
        }   
    } elseif(isClient()){
        if($type == "custom") {
            $templateParams['title'] = "Crea un prodotto";
            $templateParams['header_title'] = "Crea";
            $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/create.css?'.time().'" />',
            '<link rel="stylesheet" type="text/css" href="./css/size_selector.css?'.time().'" />',
            '<link rel="stylesheet" type="text/css" href="./css/shipping_info.css?'.time().'" />'];
            $templateParams['scripts'] = [
            '<script src="js/create_custom.js"></script>',
            '<script src="js/size_selector.js"></script>'];
            require "template/common_top_html.php";
            require "template/header.php";
            require "template/create_custom.php";
        } else {
            header("Location:login.php?type=seller");
        }
    }
    require "template/footer.php";
    require "template/common_bottom_html.php";
} else {
    if ($type == "custom"){
        $templateParams['title'] = "Crea un prodotto";
        $templateParams['header_title'] = "Crea";
        $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/create.css?'.time().'" />',
            '<link rel="stylesheet" type="text/css" href="./css/size_selector.css?'.time().'" />',
            '<link rel="stylesheet" type="text/css" href="./css/shipping_info.css?'.time().'" />'];
        $templateParams['scripts'] = ['<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>',
        '<script src="js/create_custom.js"></script>',
        '<script src="js/size_selector.js"></script>'];
        require "template/common_top_html.php";
        require "template/header.php";
        require "template/create_custom.php";
        require "template/footer.php";
        require "template/common_bottom_html.php";
    } else {
        header("Location:login.php?type=seller");
    }
}
