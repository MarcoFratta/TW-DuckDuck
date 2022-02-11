<?php
    require_once "db/database.php";
    require_once "db/connections.php";
    require_once "utils/functions.php";
    require_once "template/common.php";
    session_start();
    if (!isset($_POST['email'], $_POST['password'], $_GET['type'])) {
        // Could not get the data that should have been sent.
        $templateParams['title'] = "Accesso";
        $templateParams['header_title'] = "Indietro";
        require "template/common_top_html.php";
        require "template/header.php";
        echo displayError('Accesso non riuscito');
        require "template/footer.php";
        require "template/common_bottom_html.php";
    }

    $db = DbConnections::mySqlConnection();
    if($_GET['type'] == "client"){
        $res = $db->users()->getClientByEmail($_POST['email']);
    } else{
        $res = $db->users()->getSellerByEmail($_POST['email']);
    }
    if ($res) {
        $id = $res['id'];
        $name = $res['name'];
        $email = $_POST['email'];
        if (password_verify($_POST['password'], $res['password'])) {
            registerLoggedUser(Client::createForSession($id, $email, $name),$_GET['type']);
            //echo 'Welcome ' . $_SESSION['name'] . '!';
            header("Location:index.php");
        } else {
            // Incorrect password
            require "template/common_top_html.php";
            require "template/header.php";
            echo displayError('Password errata');
            require "template/footer.php";
            require "template/common_bottom_html.php";
  
        }
    } else {
        // Incorrect username
        require "template/common_top_html.php";
        require "template/header.php";
        echo displayError('Account non trovato');
        require "template/footer.php";
        require "template/common_bottom_html.php";
    }
?>