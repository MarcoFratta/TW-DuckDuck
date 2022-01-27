  <?php
    require_once "template/product_small.php";
    require_once "db/products_db.php";

    function newProductScroll($products)
    {
        echo "<section>
                <h3>Nuovi arrivi</h3>
                ";
        foreach ($products as $product) :
            echo smallProductCard($product);
        endforeach;
        echo "</section>";
    }
    function discountedProductScroll($products)
    {
        echo "<section>
                <h3>In sconto</h3>";
        foreach ($products as $product) :
            echo smallProductCard($product);
        endforeach;
        echo "</section>";
    }
    ?>