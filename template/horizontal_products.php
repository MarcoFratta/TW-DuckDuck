<section>
    <?php
    require_once "template/product_small.php";
    require_once "db/products_db.php";
    $products = $db->products()->getRandomNormalProducts(100);
    foreach($products as $product):
        echo smallProductCard($product);
    endforeach;
    ?>
</section>