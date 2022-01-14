<?php
     require_once "db/database.php";
     require_once "db/connections.php";
     require_once "utils/functions.php";
     require_once "model/card.php";
        if ( !isset($_POST['number'], $_POST['expire_date'],
            $_POST['cvv'])) {
            // Could not get the data that should have been sent.
            echo $_POST['number'];
            echo $_POST['expire_date'];
            echo $_POST['cvv'];
            exit('Errore inserimento');
        }
    
        $db = DbConnections::mySqlConnection();
        $secure_pass = password_hash($_POST['cvv'], PASSWORD_BCRYPT);
        $client = $db->users()->getClientById($_SESSION['id']);
        $card = Card::newCard($_POST['number'], $_POST['expire_date'], $_POST["cvv"], $client);
        $db->cards()->insertCard($card);
        echo "ok";
?>