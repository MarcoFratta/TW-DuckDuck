<?php
require "template/horizontal_products.php";
?>

<main>
    <img src="logo.png" alt="">
    <ul>
        <li><button onclick="document.location='category.php?new_products=1'" type="button">Esplora</button></li>
        <li><button  onclick="document.location='new_product.php?type=custom'" type="button">Crea</button></li>
    </ul>
    <a href="categories.php"><article>
        <h1>Categorie</h1>
    </article></a>
    <section>
        <a href="category.php?new_products=1">Nuovi arrivi</a>
        <?php echo newProductScroll($new_products)?>
    </section>
    <a href="new_product.php?type=custom"><article>
        <h1>Crea</h1>
    </article></a>
    <section>
        <a href="category.php?discounted=1">Saldi</a>
        <?php echo discountedProductScroll($discount_products)?>      
    </section>
    <a href="size.php?size=3"><article>
        <h1>Dimensioni</h1>
    </article></a>
</main>
