<?php
    require_once "db/database.php";
    require_once "db/connections.php";
    require_once "utils/functions.php";
    if (!isset($_POST['email'], $_POST['password'], $_GET['type'])) {
        // Could not get the data that should have been sent.
        exit('Errore');
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
            echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }
?>