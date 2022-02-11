<?php
require_once "bootstrap.php";
require_once "utils/functions.php";
require_once "db/connections.php";
require_once "model/client.php";
require_once "model/card.php";
require_once "model/order.php";
require_once "model/address.php";
require_once "model/product.php";
require_once "model/notification.php";

if (userIsLogged() && isClient()) {
    $templateParams['title'] = "Acquisto completato";
    $templateParams['header_title'] = "Acquisto completato";
    $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/completed.css?'.time().'" />'];
    require "template/common_top_html.php";
    require "template/header.php";
    $db = DbConnections::mySqlConnection();

    $id_client = $_SESSION['id'];
    $date = idate("Y")."-".idate("m")."-".idate("d");
    $status = "In consegna";
    $id_address = $_SESSION['address'];
    $id_card = $_POST['card'];

    $order = Order::newOrder($date, $id_address, $status, $id_card, $id_client);

    $order_id = $db->orders()->addNewOrder($order);
    if(!$order_id){
        die("errore inserimento ordine");
    }

    $order->withId($order_id);

    $normal_cart_products = isset($_SESSION['cart_normal']) ? $_SESSION['cart_normal'] : [];
    if (!empty($normal_cart_products)) {
        foreach (array_keys($normal_cart_products) as $product_id) {
            $product = $db->products()->getNormalProductById($product_id);
            if(!$product){
                echo "errore inserimento prodotto";
                continue;
            }
            $quantity = $normal_cart_products[$product_id]['quantity'];
            $amount = $product->getAmount();
            $db->products()->updateAmountProduct($product_id, $amount - $quantity);
            # aggiungere prodotto all'ordine
            $db->orders()->addNormalProductToOrder($product, $order, $quantity);
        }
        unset($_SESSION['cart_normal']);
        unset($_SESSION['address']);
        unset($_SESSION['total']);
    }

    $custom_cart_products = isset($_SESSION['cart_custom']) ? $_SESSION['cart_custom'] : [];
    if (!empty($custom_cart_products)) {
        foreach (array_keys($custom_cart_products) as $product_id) {
            # aggiungere prodotto custom al db, verificando non esista già
            $product = unserialize($custom_cart_products[$product_id]["value"]);
            $id = $db->products()->insertCustomProduct($product);
            if(!$id){
                echo "errore inserimento prodotto custom";
                continue;
            }
            $product->withId($id);
            # aggiungere prodotto all'ordine
            $quantity = $custom_cart_products[$product_id]['quantity'];
            $db->orders()->addCustomProductToOrder($product, $order, $quantity);
        }
        unset($_SESSION['cart_custom']);
    }
    
    $db->notifications()->insertClientNotification(Notification::newNotification($id_client,
    "Il tuo ordine n. " . $order_id . " è stato completato. Per dettagli sulla spedizione controlla nell'area dedicata.", 1));

    if (!empty($normal_cart_products)) {
        foreach (array_keys($normal_cart_products) as $product_id) {
            $db->notifications()->insertSellerNotification(Notification::newNotification($db->products()->getSellerById($product_id),
            "Il cliente " . $id_client . " ha acquistato il tuo prodotto con id " . $product_id . "." , 1));
        }
    }

    require "template/completed_template.php";
    require "template/footer.php";
    require "template/common_bottom_html.php";
} else {
    header("Location:login.php?type=client");
}
