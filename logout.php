<?php
    session_start();
    require_once "utils/functions.php";
    if(userIsLogged()){
        
        session_destroy();
    }  
    header('location:index.php');
?>