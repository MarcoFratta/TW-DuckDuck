<?php
session_start();
require_once "model/product.php";
require_once "db/connections.php";
require_once "db/database.php";
require_once "utils/functions.php";
require_once "template/common.php";

if (isset($_GET['action'], $_POST['type'], $_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $type = $_POST['type'];
    $action = $_GET['action'];
    if (isset($_SESSION['cart_' . $type])) {
        if ($action == "add") {
            if ($_POST['type'] == "normal") {
                $db = DbConnections::mySqlConnection();
                $product_id = (int)$_POST['product_id'];
                $product = $db->products()->getNormalProductById($product_id);
                if ($product === false) {
                    require "template/common_top_html.php";
                    require "template/header.php";
                    echo displayError("Prodotto non trovato");
                    require "template/footer.php";
                    require "template/common_bottom_html.php";
                    return;
                }
                if (isset($_SESSION['cart_' . $type][$product_id]['quantity'])) {
                    if ($product->getAmount() - $_SESSION['cart_' . $type][$product_id]['quantity'] <= 0) {
                        require "template/common_top_html.php";
                        require "template/header.php";
                        echo displayError("Prodotto esaurito");
                        require "template/footer.php";
                        require "template/common_bottom_html.php";
                        return;
                    }
                } elseif ($product->getAmount() == 0) {
                    require "template/common_top_html.php";
                    require "template/header.php";
                    echo displayError("Prodotto esaurito");
                    require "template/footer.php";
                    require "template/common_bottom_html.php";
                    return;
                }
            }
            $_SESSION['cart_' . $type][$product_id]['quantity'] += 1;
        } elseif ($action == "sub") {
            if ($_SESSION['cart_' . $type][$product_id]['quantity'] > 1) {
                $_SESSION['cart_' . $type][$product_id]['quantity'] -= 1;
            } else {
                unset($_SESSION['cart_' . $type][$product_id]);
                if (sizeof($_SESSION['cart_' . $type]) == 0) {
                    unset($_SESSION['cart_' . $type]);
                }
            }
        }
    }
}
header('location:cart.php');
