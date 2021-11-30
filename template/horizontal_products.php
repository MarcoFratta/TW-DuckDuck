<section>
    <?php
    require_once "template/product_template.php";
    require_once "db/products_db.php";
    $products = $db->products()->getRandomProducts(2);
    foreach($products as $product):
        echo smallProductCard($product);
    endforeach;
    ?>
</section>