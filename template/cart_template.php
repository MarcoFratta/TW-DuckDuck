<section id="cart_products">
    <?php
    include_once "template/cart_product.php";
    if (!isset($_SESSION['cart_normal']) && !isset($_SESSION['cart_custom'])) {
        //require "template/empty_chart";
        echo "Carrello vuoto";
        return;
    }
    $dimensions = toArray($db->products()->getDimensions());
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

        echo cart_product($product, "normal", $normal_cart_products[$product_id]['quantity'], $dimensions);
        $sum += (productPriceWithDiscount($product)) * $normal_cart_products[$product_id]['quantity'];
    }
    foreach (array_keys($custom_cart_products) as $product_id) {
        $product = unserialize($custom_cart_products[$product_id]["value"]);
        $product->withId($product_id);
        echo cart_product($product, "custom", $custom_cart_products[$product_id]['quantity'], $dimensions);
        $sum += (productPriceWithDiscount($product)) * $custom_cart_products[$product_id]['quantity'];
    }
    ?>
    <section>
        <div>
            <h6>Spedizione</h6>
            <h6><?php echo $shipping != 0 ? $shipping : "gratis" ?></h6>
        </div>
        <div>
            <h6>Iva ( <?php echo $iva * 100 ?>% )</h6>
            <h6>€ <?php echo number_format($sum * $iva,2,',',".")?></h6>
        </div>
        <div>
            <h6>Imponibile ( senza IVA )</h6>
            <h6>€ <?php echo number_format($sum - ($sum * $iva),2,',','.') ?></h6>
        </div>

        <div>
            <h6>Totale</h6>
            <h6>
                € <?php
                    $total = $sum + $shipping;
                    $_SESSION['total'] = $total;
                    echo number_format($total,2,',','.');
                    ?>
            </h6>
        </div>
    </section>
    <button type="button" onclick="document.location='addresses.php'">Procedi all'acquisto</button>
</section>