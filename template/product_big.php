<?php
require_once "model/product.php";
require_once "template/common.php";
// $product contains the product to show 
$dim_id = $product->getDimension();
$dimension = $db->products()->getDimensionById($dim_id);
$price = formatPrice(productPriceWithDiscount($product));
$category = $db->categories()->getCategoryById($product->getCategory());
?>
<section>
    <article>
        <img alt="Papera" src="<?php echo $product->getImagePath() ?>">
        <div class="title">
            <div>
                <h1><?php echo $product->getName() ?></h1>
                <h3><?php echo $category->getName() ?></h3>
            </div>
            <img alt="heart" src="../img/mix/empty_heart.png" />
        </div>

        <p><?php echo $product->getDescription() ?></p>
        <?php echo '<div' . ($product->getAmount() == 0 ? ' class="sold_out"' : ' class="available"') . '>' ?>
        <svg width="10" height="10" viewBox="0 0 10 10"  xmlns="http://www.w3.org/2000/svg">
            <rect width="10" height="10" rx="5"  />
        </svg>

        <h3><?php echo $product->getAmount() ?> disponibili</h3>
        </div>
        <div>
            <h1>€ <?php echo $price ?></h1>
            <h3>IVA inclusa</h3>
        </div>


        <?php echo displaySize($dimension->getSize()) ?>
        <a href="size.php?size=<?php echo $dimension->getSize() ?>">Guida alle taglie</a>

        <form action="add_cart.php" method="post">
            <input type="hidden" name="type" value="normal">
            <input type="hidden" name="product_id" value="<?php echo $product->getId() ?>">
            <button type="submit">Aggiungi al carrello</button>
        </form>
        <?php echo shippingInfo() ?>
    </article>
</section>