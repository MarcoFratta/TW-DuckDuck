
<?php
session_start();
require_once "../db/connections.php";
require_once "../db/database.php";
require_once "../utils/functions.php";


if(!isset($_GET['type'])){
    var_dump($_GET);
    die("error get");
}
if (!userIsLogged() ||  !isSeller() || !isset(
    $_POST['name'],
    $_POST['price'],
    $_POST['description'],
    $_POST['id'],
    $_POST['amount'],
    $_POST['discount'],
    $_POST['category']
)) {
    var_dump($_POST);
    die("error post");
}
$db = DbConnections::mySqlConnection();
if($_GET['type'] == "normal"){
    $product = $db->products()->getNormalProductById($_POST['id']);
    if(!$product){
        die("Product does not exists");
    }

    $dimension = $db->products()->getDimensionBySize($_POST['dimension']);
    if(!$dimension){
        die("Dimension does not exists");
    }

    $img = uploadImage();
    $delete=true;
    if(!$img){
        $img = $product->getImagePath();
        $delete = false;
    }

    $update_product = new Product($_POST['id'],$_POST['name'],$_POST['description'],$img,
    $_POST['price']*100,$dimension->getId(),$_POST['amount'],$_POST['discount'],null,$_POST['category'],null);

    $res = $db->products()->updateNormalProduct($update_product);
    if($res){
        if($product->getImagePath() !== null && $delete){
            deleteImage($product->getImagePath());
        }
            echo "ok";
    } else { 
        deleteImage($product->getImagePath());
            echo "invalid file";
    }
}




