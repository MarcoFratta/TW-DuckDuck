<h1>I miei prodotti</h1>
<?php

    require_once "template/product_small.php";
    $products = $db->products()->getProductsBySeller($seller_id);
    foreach ($products as $product){
        echo sellerProductCard($product);
    }
?>
<form action="new_product.php">
            <input type="submit" value="Aggiungi un prodotto" />
</form>