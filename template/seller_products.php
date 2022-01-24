<h1>I miei prodotti</h1>
<?php

require_once "template/product_small.php";
$products = $db->products()->getProductsBySeller($seller_id);
foreach ($products as $product) {
    echo sellerProductCard($product);
}
?>
<form method="GET" action="new_product.php">
    <input type="hidden" name="type" value="item" />
    <input type="submit" value="Aggiungi un pezzo" />
</form>
<form method="GET" action="new_product.php">
    <input type="hidden" name="type" value="normal" />
    <input type="submit" value="Aggiungi un prodotto" />
</form>