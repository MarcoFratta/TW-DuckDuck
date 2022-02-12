<?php
session_start();
require_once "../db/connections.php";
require_once "../db/database.php";
require_once "../utils/functions.php";

if (!isset($_GET['type'])) {
    var_dump($_GET);
    die("error get");
}
if (!userIsLogged() ||  !isSeller() || !isset(
    $_POST['id'],
)) {
    var_dump($_POST);
    die("error post");
}
$db = DbConnections::mySqlConnection();
if ($_GET['type'] == "normal") {
    $product = $db->products()->getNormalProductById($_POST['id']);
    if (!$product) {
        die("Product does not exists");
    }
    ($db->products()->deleteNormalProductById($product->getId()));
}
