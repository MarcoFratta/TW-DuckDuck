<?php
    require_once "bootstrap.php"; 
    require_once "utils/functions.php";
    if (userIsLogged()) {
        require_once "db/connections.php";
        require_once "db/database.php";
        require_once "db/users_db.php";
        $db = DbConnections::mySqlConnection();
        $gender = $_GET['gender'];
        $phone = $_GET['phone'];
        $id = $_SESSION['id'];
        if($gender!=""){
            $db->users()->editGender($id, $gender);
        }
        if($phone!=""){
            $db->users()->editPhone($id, $phone);
        }

        header('location:details.php');
    }
?>