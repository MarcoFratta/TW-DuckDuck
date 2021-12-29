<?php
     require_once "db/database.php";
     require_once "db/connections.php";
     require_once "utils/functions.php";
     require_once "model/client.php";
     if ( !isset($_POST['email'], $_POST['password'],
          $_POST['name'], $_POST['type'])) {
         // Could not get the data that should have been sent.
         echo $_POST['email'];
         echo $_POST['password'];
         echo $_POST['name'];
         echo $_POST['type'];
         exit('Errore inerimento');
     }
 
     $db = DbConnections::mySqlConnection();
     $secure_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
     $user = Client::newUser($_POST['name'], $_POST['email'], $secure_pass);
     if ($_POST['type'] == "client"){
          $db->users()->insertUser($user);
     } else {
          $db->users()->insertSeller($user);
     }
     echo "ok";
?>