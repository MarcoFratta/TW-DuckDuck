<?php 
    $id_client = $_SESSION['id'];
    $date = idate("Y")."-".idate("m")."-".idate("d");
    $status = "In consegna";
    $id_address = $_SESSION['address'];
    $id_card = $_SESSION['card'];

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
            # aggiungere prodotto all'ordine
            $db->orders()->addNormalProductToOrder($product, $order, $quantity);
        }
        unset($_SESSION['cart_normal']);
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
    "Il tuo ordine è stato completato. Per dettagli sulla spedizione controlla nell'area dedicata.", 0));

    if (!empty($normal_cart_products)) {
        foreach (array_keys($normal_cart_products) as $product_id) {
            $db->notifications()->insertSellerNotification(Notification::newNotification($db->products()->getSellerById($product_id),
            "Il cliente " . $id_client . " ha acquistato il tuo prodotto con id " . $product_id . "." , 0));
        }
    }

?>

<h1>Acquisto completato</h1>
<section id="completed">
    <p>Grazie per aver acquistato su Duck Duck!</p>
</section>

<button type="button" onclick="document.location='orders.php'">Vai ai tuoi ordini</button>

<!-- el: FOOTER -->