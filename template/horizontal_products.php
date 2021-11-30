<section>
    <?php
    require_once "template/product_template.php";
    foreach($products as $product):
        echo smallProductCard($product);
    endforeach;
    ?>
</section>