  <?php
    require_once "template/product_small.php";
    require_once "db/products_db.php";
    require_once "model/types.php";
    $dimensions = toArray($db->products()->getDimensions());

    function newProductScroll($products)
    {
        global $dimensions;
        $type = Type::NEW_PRODUCT;
        foreach ($products as $product) :
            echo smallProductCard($product,$dimensions,$type);
        endforeach;
    }
    function discountedProductScroll($products)
    {
        global $dimensions;
        $type = Type::DISCOUNT;
        foreach ($products as $product) :
            echo smallProductCard($product,$dimensions,$type);
        endforeach;
    }
    ?>