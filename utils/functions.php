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

function hashPassword($password){
    return hash('sha512', $password);
}

function registerLoggedUser($user, $type){
    $_SESSION["id"] = $user->getId();
    $_SESSION["email"] = $user->getEmail();
    $_SESSION["name"] = $user->getName();
    $_SESSION["type"] = $type;
}
?>