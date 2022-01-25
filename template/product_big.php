<?php
require_once "model/product.php";
require_once "template/common.php";
// $product contains the product to show 
$dim_id = $product->getDimension();
$dimension = $db->products()->getDimensionById($dim_id);
$price = productPriceWithDiscount($product);
?>
<article>
    <h1><?php echo $product->getName() ?></h1>
    <h3>Categorie</h3>
    <img> <!-- icona cuore per i preferiti -->

    <img alt="" src="<?php echo $product->getImagePath() ?>"> <!-- immagine prodotto -->

    <p><?php echo $product->getDescription() ?></p>
    <h3>- <?php echo $product->getAmount() ?> disponibili</h3>

    <h1>€ <?php echo $price?></h1>
    <h3>IVA inclusa</h3>

    <?php echo sizeSelector($dimension->getSize())?>
    <a href="size.php?size=<?php echo $dimension->getSize()?>">Guida alle taglie</a>

    <form action="add_cart.php" method="post">
        <input type="hidden" name="type" value="normal">
        <input type="hidden" name="product_id" value="<?php echo $product->getId() ?>">
        <button type="submit">Aggiungi al carrello</button>
    </form>

    <?php echo shippingInfo() ?>

</article>