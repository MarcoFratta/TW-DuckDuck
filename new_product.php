<?php

  require_once "db/connections.php";
  require_once "db/database.php";
  require_once "utils/functions.php";
  require_once "bootstrap.php";
 

  $templateParams['title'] = "Aggiungi Prodotto";
  if (!isset($_GET['type'])){
      die("Errore tipo");
  }
  if(userIsLogged()){
    if(isSeller()){
        require "template/common_top_html.php";
        require "template/header.php";
        $type = $_GET['type'];
        $db = DbConnections::mySqlConnection();
        if($type == "normal"){
            require "template/new_product.php";
        } elseif ($type == "custom"){

        } elseif ($type == "item"){
            require "template/new_item.php";
        }     
        require "template/common_bottom_html.php";
    } else{
        die("Accesso negato");
    }
} else {
    header("Location:login.php?type=seller");
}
