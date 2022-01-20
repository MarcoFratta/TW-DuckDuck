<?php
require_once "db/connections.php";
require_once "db/database.php";
require_once "utils/functions.php";
require_once "bootstrap.php";

if (isset($_POST['type'])) {
    // get the type of the product
    $type = $_POST['type'];
    $quantity = 1;
    $db = DbConnections::mySqlConnection();
    if ($type == "normal") {
        $product_id = (int)$_POST['product_id'];
        $product = $db->products()->getNormalProductById($product_id);
        $cart_name = "cart_normal";
        if ($product === false) {
            die("product does not exists");
        }
    } else {
        if (isset($_POST['top_id'], $_POST['middle_id'], $_POST['bottom_id'], $_POST['dimension'])) {
            $parts = [$_POST['top_id'], $_POST['middle'], $_POST['bottom']];
            $price = 0;
            foreach ($parts as $part) {
                $item = $db->products()->getCustomItemById($part);
                if ($item == false) {
                    die("item not existing");
                }
                $price += $item->getPrice();
            }
            $dim_id = $_POST['dimension'];
            $dimension = $db->products()->getDimensionById($dim_id);
            if ($dimension === false)
                die('dimension not existing');
            $price += $dimension->getPrice();
            $date = new DateTime('now');
            $date->setTimezone(new DateTimeZone('UTC'));
            $date = $date->format('Y-m-d');
            $product = new CustomProduct(null, $price, $dim_id, $date, $parts);
            $inserted_id = $db->products()->insertCustomProduct($product);
            if (!$inserted_id) {
                die("error inserting custom item");
            }
            $product_id = $inserted_id;
            $cart_name = "cart_custom";
        }
    }

    // Product exists in database, now we can create/update the session variable for the cart
    if (isset($_SESSION[$cart_name]) && is_array($_SESSION[$cart_name])) {
        if (array_key_exists($product_id, $_SESSION[$cart_name])) {
            // Product exists in cart so just update the quanity
            $_SESSION[$cart_name][$product_id] += $quantity;
        } else {
            // Product is not in cart so add it
            $_SESSION[$cart_name][$product_id] = $quantity;
        }
    } else {
        // There are no products in cart, this will add the first product to cart
        $_SESSION[$cart_name] = array($product_id => $quantity);
    }
}
// Prevent form resubmission...
header('location: cart.php');
exit;
