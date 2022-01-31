<h1>I miei prodotti</h1>
<form method="GET" action="new_product.php">
    <input type="hidden" name="type" value="item" />
    <input type="submit" value="Aggiungi un pezzo" />
</form>
<form method="GET" action="new_product.php">
    <input type="hidden" name="type" value="normal" />
    <input type="submit" value="Aggiungi un prodotto" />
</form>
<section id="edit_products">
<?php

require_once "template/product_small.php";
require_once "template/common.php";
$products = $db->products()->getProductsBySeller($seller_id);
$categories = toArray($db->categories()->getCategories());
$dimensions = toArray($db->products()->getDimensions());
foreach ($products as $product) {
    echo sellerProductCard($product, $categories,$dimensions);
}
?>
</section>
