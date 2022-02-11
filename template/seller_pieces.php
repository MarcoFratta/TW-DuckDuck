<section id="edit_products">
    <section>
        <form method="GET" action="new_product.php">
            <input type="hidden" name="type" value="item" />
            <input type="submit" value="Aggiungi un pezzo" />
        </form>
    </section>
    <?php

    require_once "template/product_small.php";
    require_once "template/common.php";
    $products = $db->products()->getPiecesBySeller($seller_id);
    foreach ($products as $product) {
        echo sellerPieceCard($product);
    }
    ?>
</section>