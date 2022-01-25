<?php
require_once "db/connections.php";
require_once "db/database.php";
require_once "utils/functions.php";
require_once "model/product.php";
session_start();

if (!isset($_GET['type'])) {
    die("Errore tipo");
}
if (!userIsLogged()) {
    die("Errore sessione");
}
$db = DbConnections::mySqlConnection();
if ($_GET['type'] == "normal" && isSeller()) {
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
    $img = uploadImage();
    $img_path = $img == false ? null : $img;
    $product = new Product(
        null,
        $_POST['name'],
        $_POST['desc'],
        $img_path,
        $_POST['price'] * 100,
        $_POST['dim'],
        $_POST['amount'],
        $_POST['discount'],
        $_SESSION['id'],
        $_POST['category'],
        $_POST['price'],
        null
    );
    $res = $db->products()->insertNormalProduct($product);
    if (!$res) {
        echo "errore inserimento nel db";
        if($img_path!== null)
            unlink($img_path);
    } else {
        header("Location:new_product.php?type=normal");
    }
} elseif ($_GET['type'] == "item" && isSeller()) {
    if (!isset(
        $_POST['name'],
        $_POST['price'],
        $_POST['layer'],
    )) {
        var_dump($_POST);
        die("errore inserimento");
    }
    $img = uploadImage();
    if(!$img){
        die("errore immagine non valida");
    }
    $item = new CustomItem(null,$_POST['price'] * 100,$img,$_SESSION['id'],$_POST['name'],null,$_POST['layer']);
    $res = $db->products()->insertCustomItem($item);
    if (!$res) {
        unlink($img);
        echo "errore inserimento nel db";
     } else {
        header("Location:new_product.php?type=item");
     }
}




function uploadImage()
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
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
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Solo JPG, JPEG, PNG ammessi.";
        return false;
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        echo "Errore caricamento file";
    }
}
