<h1><?php echo $title ?></h1>
<section id="vertical_products">
    <?php
    require_once "template/product_small.php";
    require_once "db/products_db.php";
    $dimensions = toArray($db->products()->getDimensions());
    foreach ($products as $product) :
        echo smallProductCard($product, $dimensions);
    endforeach;
    ?>
</section>