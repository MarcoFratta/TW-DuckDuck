<?php
require_once "model/product.php";
// $product contains the product to show 
$dim_id = $product->getDimension();
$dimension = $db->products()->getDimensionById($dim_id);
?>
<article>
    <h1><?php echo $product->getName() ?></h1>
    <h3>Categorie</h3>
    <img> <!-- icona cuore per i preferiti -->

    <img alt="" src="<?php echo $product->getImagePath() ?>"> <!-- immagine prodotto -->

    <p><?php echo $product->getDescription() ?></p>
    <h3>- <?php echo $product->getAmount() ?> disponibili</h3>

    <h1>€ <?php echo $product->getPrice() / 100 ?></h1>
    <h3>IVA inclusa</h3>

    <img> <!-- Papere che indicano la dimensione -->
    <a href="size.php?size=<?php echo $dimension->getSize()?>">Guida alle taglie</a>

    <form action="add_cart.php" method="post">
        <input type="hidden" name="type" value="normal">
        <input type="hidden" name="product_id" value="<?php echo $product->getId() ?>">
        <button type="submit">Aggiungi al carrello</button>
    </form>

    <div>
        <img> <!-- icona del calendario -->
        <p>Consegna entro 7 giorni lavorativi</p>
        <img> <!-- icona del furgone -->
        <p>Spedizione gratuita</p>
        <img> <!-- icona dello scudo -->
        <p>24 mesi di garanzia</p>
        <img> <!-- icona del box -->
        <p>Reso gratuito entro 60 giorni</p>
        <img> <!-- icona dell'ambiente -->
        <p>Plastica 100% riciclata</p>
    </div>

</article>