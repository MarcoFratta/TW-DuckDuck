<?php
require_once "model/client.php";
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}
# returns true if a user is logged.
function userIsLogged(){
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
}
# returns true if the logged user is a seller.
#Check if userIsLogged() before calling this function.
function isSeller(){
    return $_SESSION['type'] == "seller";
}
# returns true if the logged user is a client.
#Check if userIsLogged() before calling this function.
function isClient(){
    return $_SESSION['type'] == "client";
}
# register a new user in the session.
function registerLoggedUser($user, $type){
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $user->getId();
    $_SESSION["email"] = $user->getEmail();
    $_SESSION["name"] = $user->getName();
    $_SESSION["type"] = $type;
}
?>