<?php
    require_once "db/database.php";
    require_once "db/connections.php";
    require_once "utils/functions.php";
    require_once "model/card.php";
    if ( !isset($_POST['number'], $_POST['expire_date'], $_POST['cvv'], $_POST['client_id'])) {
        // Could not get the data that should have been sent.
        echo $_POST['number']." - ";
        echo $_POST['expire_date']." - ";
        echo $_POST['cvv']." - ";
        echo $_POST['client_id'];
        exit('Errore inserimento');
    }
    
    $db = DbConnections::mySqlConnection();
    $card = Card::newCard($_POST['number'], $_POST['expire_date'], $_POST['cvv'], $_POST['client_id']);
    $db->cards()->insertCard($card);
    echo "ok";
?>