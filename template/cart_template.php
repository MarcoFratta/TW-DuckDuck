<h1>Il tuo carrello</h1>
<section id="cart_products">
    <?php
    include_once "template/cart.product.php";
    if (!isset($_SESSION['cart_normal']) && !isset($_SESSION['cart_custom'])) {
        //require "template/empty_chart";
        echo "Carrello vuoto";
        return;
    }
    $normal_cart_products = isset($_SESSION['cart_normal']) ? $_SESSION['cart_normal'] : [];
    $custom_cart_products = isset($_SESSION['cart_custom']) ? $_SESSION['cart_custom'] : [];
    $sum = 0;
    $iva = 0.22;
    $shipping = 0;
    foreach (array_keys($normal_cart_products) as $product_id) {
        $product = $db->products()->getNormalProductById($product_id);
        if (!$product) {
            echo ("Product does not exits");
            continue;
        }
        echo cart_product($product, "normal", $normal_cart_products[$product_id]);
        $sum += ($product->getPrice() / 100) * $normal_cart_products[$product_id];
    }

    foreach (array_keys($custom_cart_products) as $product_id) {
        $product = $db->products()->getCustomProductById($product_id);
        if (!$product) {
            echo ("Product does not exits");
            continue;
        }
        echo cart_product($product, "custom", $custom_cart_products[$product_id]);
        $sum += ($product->getPrice() / 100) * $custom_cart_products[$product_id];
    }
    ?>
</section>

<section>
    <h6>Imponibile (senza IVA)</h6>
    <h6>€ <?php echo $sum - ($sum * $iva) ?></h6>
    <h6>Spedizione</h6>
    <h6><?php echo $shipping != 0 ? $shipping : "gratis" ?></h6>
    <h6>Iva (<?php echo $iva * 100 ?> %)</h6>
    <h6>€ <?php echo $sum * $iva ?></h6>
    <h6>Totale</h6>
    <h6>€ <?php echo $sum + $shipping ?></h6>
</section>

<button type="button" onclick="document.location='addresses.php'">Procedi all'acquisto</button>

<!-- el: FOOTER -->