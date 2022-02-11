<?php
require_once "db/connections.php";
require_once "db/database.php";
require_once "utils/functions.php";
require_once "model/product.php";
require_once "template/common.php";
session_start();

if (!isset($_GET['type'])) {
    die(displayError("Errore tipo"));
}
if (!userIsLogged()) {
    die(displayError("Errore sessione"));
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
        die(displayError("errore inserimento"));
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
        echo displayError("errore inserimento nel db");
        if($img_path!== null)
            deleteImage($img_path);
    } else {
        header("Location:new_product.php?type=normal");
    }
} elseif ($_GET['type'] == "item" && isSeller()) {
    if (!isset(
        $_POST['name'],
        $_POST['price'],
        $_POST['layer']
    )) {
        var_dump($_POST);
        die(displayError("errore inserimento"));
    }
    $img = uploadImage();
    if(!$img){
        die(displayError("errore immagine non valida"));
    }
    $item = new CustomItem(null,$_POST['price'] * 100,$img,$_SESSION['id'],$_POST['name'],null,$_POST['layer']);
    $res = $db->products()->insertCustomItem($item);
    if (!$res) {
        deleteImage($img);
        echo displayError("errore inserimento nel db");
     } else {
        header("Location:new_product.php?type=item");
     }
}
