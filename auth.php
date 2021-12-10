<?php
    require_once "db/database.php";
    require_once "db/connections.php";
    require_once "functions.php";
    if ( !isset($_POST['email'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Errore');
    }

    $db = DbConnections::mySqlConnection();
    $stmt = $db->users()->getClientByEmail($_POST['email']);
?>