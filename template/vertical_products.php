<section id="vertical_products">
    <?php
    require_once "template/product_small.php";
    require_once "db/products_db.php";
    require_once "model/types.php";
    $dimensions = toArray($db->products()->getDimensions());
    foreach ($products as $product) :
        $type = null;
        if ($product->getDiscount() !== null && $product->getDiscount() > 0) {
            $type = Type::DISCOUNT;
        } else {
            $p_date = $product->getAdditionDate();
            if ($p_date !== null) {
                $plus_date = Date('y:m:d', strtotime($p_date . ' + 10 days'));
                if ($plus_date >= Date('y:m:d')) {
                    $type = Type::NEW_PRODUCT;
                }
            }
        }
        echo smallProductCard($product, $dimensions, $type);
    endforeach;
    ?>
</section>