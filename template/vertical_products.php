<?php 
    if(isset($_GET['category'])) {
        $dest = "category.php?category=".$_GET['category'];
    } elseif(isset($_GET['new_products'])) {
        $dest = "category.php?new_products=1";
    } elseif(isset($_GET['discounted'])) {
        $dest = "category.php?discounted=1";
    }
    
?>

<form id="filtersContainer" method="POST" action="<?php echo $dest ?>">
    <div>
        <h4>Nome:</h4>
        <div>
            <div class="single-filter">
                <input type="radio" id="alpha" value="alpha" name="filter"/>
                <label for="alpha">A-Z</label>
            </div>
            <div class="single-filter">
                <input type="radio" id="omega" value="omega" name="filter"/>
                <label for="omega">Z-A</label>
            </div>
        </div>
    </div>
    <div>
        <h4>Prezzo:</h4>
        <div>
            <div class="single-filter">
                <input type="radio" id="cPrice" value="cPrice" name="filter"/>
                <label for="cPrice">min-max</label>
            </div>
            <div class="single-filter">
                <input type="radio" id="dPrice" value="dPrice" name="filter"/>
                <label for="dPrice">max-min</label>
            </div>
        </div>
    </div>
    <div>
        <h4>Dimensione:</h4>
        <div>
            <div class="single-filter">
                <input type="radio" id="cDim" value="cDim" name="filter"/>
                <label for="cDim">1-5</label>
            </div>
            <div class="single-filter">
                <input type="radio" id="dDim" value="dDim" name="filter"/>
                <label for="dDim">5-1</label>
            </div>
        </div>
    </div>
</form>

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