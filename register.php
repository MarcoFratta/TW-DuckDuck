<?php
     require_once "db/database.php";
     require_once "db/connections.php";
     require_once "utils/functions.php";
     require_once "model/client.php";
     require_once "model/notification.php";
     if ( !isset($_POST['email'], $_POST['password'],
          $_POST['name'], $_POST['type'])) {
         // Could not get the data that should have been sent.
         echo $_POST['email'];
         echo $_POST['password'];
         echo $_POST['name'];
         echo $_POST['type'];
         exit('Errore inserimento');
     }
 
     $db = DbConnections::mySqlConnection();
     $secure_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
     $user = Client::newUser($_POST['name'], $_POST['email'], $secure_pass);
     if ($_POST['type'] == "client"){
          $id = $db->users()->insertUser($user);
          $db->notifications()->insertClientNotification(Notification::newNotification($id, "Ciao " . $_POST['name'] ."! Grazie per esserti iscritto al nostro sito!" , date("h:i:sa"), 0));
     } else {
          $id = $db->users()->insertSeller($user);
          $db->notifications()->insertSellerNotification(Notification::newNotification($id, "Ciao " . $_POST['name'] ."! Grazie per esserti iscritto al nostro sito!" , date("h:i:sa"), 0));
     }
     header('location:index.php');
?>