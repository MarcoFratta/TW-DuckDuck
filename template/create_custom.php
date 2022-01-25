<?php
require_once "model/product.php";
require_once "template/common.php";
$layers = ["top","middle","base","bottom"];
$default_size = 3;
// $product contains the product to show 
?>
<article>
    <h2>Come la vuoi tu!</h2>
    <form action="add_cart.php" method="post">
        <?php 
            foreach ($layers as $layer){
                echo '<div><button type="button" id="'.$layer.'_left"><</button>
                <img id="'.$layer.'_img" alt="" src=" style="width=300; heigth= 400;"> 
                <button type="button" id="'.$layer.'_right">></button>
                <input type="hidden" id="'.$layer.'_id" name="'.$layer.'_id" value=""/>
                </div>';
            }
        ?>     
        <?php echo sizeSelector($default_size) ?>
        <a href="size.php?size=<?php echo $default_size?>">Guida alle taglie</a>
        <input type="hidden" name="type" value="custom">
        <button type="submit">Aggiungi al carrello</button>
    </form>
    <?php echo shippingInfo() ?>
    <h3>Prezzo</h3>
    <h1 id="price"></h1>
    <h3>IVA inclusa</h3>
</article>