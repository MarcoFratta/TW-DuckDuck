<?php
require_once "model/product.php";
require_once "template/common.php";
$layers = ["top", "middle", "base", "bottom"];
$default_size = 3;
// $product contains the product to show 
?>
<section>
<h2>Come la vuoi tu!</h2>
<form action="add_cart.php" method="post">
    <?php
    foreach ($layers as $layer) {
        echo '<div class="create_div">
                    <button type="button" id="' . $layer . '_left"><</button>
                    <img id="' . $layer . '_img" alt="" src=""  width="400" height="500"> 
                    <button type="button" id="' . $layer . '_right">></button>
                    <input type="hidden" id="' . $layer . '_id" name="' . $layer . '_id" value=""/>
                </div>';
    }
    ?>
    <?php echo sizeSelector($default_size) ?>
    <input type="hidden" name="type" value="custom">
    <h1 id="price"></h1>
    <button type="submit">Aggiungi al carrello</button>
</form>
<?php echo shippingInfo() ?>
</section>