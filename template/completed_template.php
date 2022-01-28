<?php 
    $id = $_SESSION['id'];
    $date = idate("Y").idate("m").idate("d");
    $status = 0;
    $id_address = $_SESSION['address'];
    $id_card = $_SESSION['card'];
    $id_client = $db->users()->getClientById($id);

    $order = Order::newOrder($date, $id_address, $status, $id_card, $id_client);

    $normal_cart_products = isset($_SESSION['cart_normal']) ? $_SESSION['cart_normal'] : [];
    if ($normal_cart_products != []) {
        foreach (array_keys($normal_cart_products) as $product_id) {
            $product = $db->products()->getNormalProductById($product_id);
            if ($product != null) {
                $order->addNormalProduct($product);
            }
        }
    }
    

    $custom_cart_products = isset($_SESSION['cart_custom']) ? $_SESSION['cart_custom'] : [];
    if ($custom_cart_products != []) {
        foreach (array_keys($custom_cart_products) as $product_id) {
            $product = $db->products()->getCustomProductById($product_id);
            if ($product != null) {
                $order->addCustomProduct($product);
            }
        }
    }

    $db->orders()->addNewOrder($order);
?>

<h1>Acquisto completato</h1>
<section id="completed">
    <p>Grazie per aver acquistato su Duck Duck!</p>
</section>

<button type="button" onclick="document.location='orders.php'">Vai ai tuoi ordini</button>

<!-- el: FOOTER -->