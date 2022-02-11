<?php
require_once "model/product.php";
require_once "template/common.php";
// $product contains the product to show 
$dim_id = $product->getDimension();
$dimension = $db->products()->getDimensionById($dim_id);
$price = productPriceWithDiscount($product);
$id_category = $product->getCategory();
$category = $db->categories()->getCategoryById($id_category);
$category_name = $category->getName();
?>
<article>
    <img alt="product image" src="<?php echo $product->getImagePath() ?>">
    <div class="title">
        <h2><?php echo $product->getName() ?></h2>
        <h4><?php echo $category_name ?></h4>
        <img alt="heart" src="img/mix/empty_heart.png"/>
    </div>
    <p><?php echo $product->getDescription() ?></p>
    <h4><?php echo $product->getAmount() ?> disponibili</h4>

    <div class="price">
        <h3>€ <?php echo $price?></h1>
        <h4>IVA inclusa</h4>
    </div>
    
    <?php echo displaySize($dimension->getSize())?>
    <a href="size.php?size=<?php echo $dimension->getSize()?>">Guida alle taglie</a>

    <form action="add_cart.php" method="post">
        <input type="hidden" name="type" value="normal">
        <input type="hidden" name="product_id" value="<?php echo $product->getId() ?>">
        <button type="submit">Aggiungi al carrello</button>
    </form>

    <?php echo shippingInfo() ?>

</article>