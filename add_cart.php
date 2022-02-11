<?php
require_once "db/connections.php";
require_once "db/database.php";
require_once "utils/functions.php";
include_once "model/product.php";
require_once "template/common.php";

session_start();


$allowed_parts = ['bottom','base','middle','top'];

if (isset($_POST['type'])) {
    if (userIsLogged() && isSeller()) {
        require "template/common_top_html.php";
        require "template/header.php";
        echo displayError("Non é possibile effettuare acquisti con un account venditore");
        require "template/footer.php";
        require "template/common_bottom_html.php";
        return;
    }
    // get the type of the product
    $type = $_POST['type'];
    $quantity = 1;
    $db = DbConnections::mySqlConnection();
    if ($type == "normal") {
        $product_id = (int)$_POST['product_id'];
        $product = $db->products()->getNormalProductById($product_id);
        if ($product === false) {
            require "template/common_top_html.php";
            require "template/header.php";
            echo displayError("Prodotto non trovato");
            require "template/footer.php";
            require "template/common_bottom_html.php";
        }
        $cart_name = "cart_normal";
        $value = $product;
    } else {
        $parts = [];
        foreach($allowed_parts as $part){
            if(!isset($_POST[$part.'_id'])){
                require "template/common_top_html.php";
                require "template/header.php";
                echo displayError("Errore inserimento");
                require "template/footer.php";
                require "template/common_bottom_html.php";
                return;
            }
        } 
            array_push($parts,$_POST[$part.'_id']);
        if (isset($_POST['dimension'])) {
            $price = 0;
            foreach ($parts as $part) {
                $item = $db->products()->getCustomItemById($part);
                if ($item == false) {
                    require "template/common_top_html.php";
                    require "template/header.php";
                    echo displayError("Prodotto non trovato");
                    require "template/footer.php";
                    require "template/common_bottom_html.php";
                    return;
                }
            }
                $price += $item->getPrice();
        }
            $dim_id = $_POST['dimension'];
            $dimension = $db->products()->getDimensionBySize($dim_id);
            if ($dimension == false) {
                require "template/common_top_html.php";
                require "template/header.php";
                echo displayError("Dimensnione non trovata");
                require "template/footer.php";
                require "template/common_bottom_html.php";
                return;
            }
            $price += $dimension->getPrice();
            $product = serialize(new CustomProduct(null, $price, $dim_id, null, $parts));
            $hash = md5($product);
            $product_id = $hash;
            $cart_name = "cart_custom";
            $value = $product;
        }
    } else {
        require "template/common_top_html.php";
        require "template/header.php";
        echo displayError("Errore inserimento");
        require "template/footer.php";
        require "template/common_bottom_html.php";
        return;
    }
    

    // Product exists in database, now we can create/update the session variable for the cart
    if (isset($_SESSION[$cart_name]) && is_array($_SESSION[$cart_name])) {
        if (array_key_exists($product_id, $_SESSION[$cart_name])) {
            // Product exists in cart so just update the quanity
            $_SESSION[$cart_name][$product_id]['quantity'] += $quantity;
        } else {
            // Product is not in cart so add it
            $_SESSION[$cart_name][$product_id] = array("quantity" => $quantity, "value" => $value);
        }
    } else {
        // There are no products in cart, this will add the first product to cart
        $_SESSION[$cart_name] = array($product_id => array("quantity" => $quantity, "value" => $value));
    }

// Prevent form resubmission...
header('location: cart.php');
exit;
