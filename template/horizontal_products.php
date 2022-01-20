<section>
    <?php
    require_once "template/product_small.php";
    require_once "db/products_db.php";
    foreach($products as $product):
        echo smallProductCard($product);
    endforeach;
    ?>
</section>