<?php
require_once "db/connections.php";
require_once "db/database.php";
require_once "utils/functions.php";
session_start();
require_once "model/product.php";
if (!isset($_GET['type'])) {
    die("Errore");
}
if ($_GET['type'] == "normal") {
    if (!isset(
        $_POST['name'],
        $_POST['dim'],
        $_POST['desc'],
        $_POST['price'],
        $_POST['discount'],
        $_POST['amount'],
        $_POST['category']
    )) {
        var_dump($_POST);
        die("errore inserimento");
    }
    $db = DbConnections::mySqlConnection();
    $img = uploadImage();
    $img_path = $img == false ? null : $img;
    $date = date("Y-m-d");
    $product = new Product(null,$_POST['name'],$_POST['desc'],$img_path,
    $_POST['price'],$_POST['dim'],$_POST['amount'],$_POST['discount'],$_SESSION['id'],
    $_POST['category'],$_POST['price'],$date);
    $res = $db->products()->insertNormalProduct($product);
    if (!$res){
        echo "errore inserimento nel db";
    } else {
        header("Location:new_product.php");
    }
    
}




function uploadImage(){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Error, file is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "File gia esistente";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["img"]["size"] > 500000) {
        echo "Dimensione del file troppo grande";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Solo JPG, JPEG, PNG ammessi.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Errore inserimento immagine";
        return false;
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Errore caricamento file";
        }
    }
}
