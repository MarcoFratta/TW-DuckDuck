<?php
require_once  __DIR__."/../model/client.php";
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
function productPriceWithDiscount($product){
    $price = $product->getPrice() / 100;
    $discount = $product->getDiscount();
    if($discount !== null && $discount !== 0){
        $price = $price - ($price*$discount/100);
    } 
    return $price;
}

function toArray($value){
    $arr = [];
    foreach($value as $v){
        array_push($arr,$v);
    }
    return $arr;
}

function utf8ize($d) {
    if (is_array($d)) 
        foreach ($d as $k => $v) 
            $d[$k] = utf8ize($v);

     else if(is_object($d))
        foreach ($d as $k => $v) 
            $d->$k = utf8ize($v);

     else if(is_string($d))
        return utf8_encode($d);

    return $d;
}

function deleteImage($img){
    unlink("../".$img);
}
function uploadImage()
{
    $prefix = "../";
    $target_dir = "uploads/";
    $target_file = $prefix.$target_dir . basename($_FILES["img"]["name"]);
    $return_dir =  $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check == false) {
            echo "Error, file is not an image.";
            return false;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "File gia esistente";
        return false;
    }

    // Check file size
    if ($_FILES["img"]["size"] > 5000000) {
        echo "Dimensione del file troppo grande";
        return false;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Solo JPG, JPEG, PNG ammessi.";
        return false;
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        return $return_dir;
    } else {
        echo "Errore caricamento file";
    }
}
