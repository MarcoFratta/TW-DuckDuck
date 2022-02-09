<?php
require "template/horizontal_products.php";
?>
    <div class="cover">
        <img src="img/logo.png" alt="Cover Logo">
        <ul>
            <li><button onclick="document.location='category.php?new_products=1'" type="button">ESPLORA</button></li>
            <li><button  onclick="document.location='new_product.php?type=custom'" type="button">CREA</button></li>
        </ul>
    </div>

    <button onclick="document.location='categories.php'" type="button">Categorie</button>
    
    <section>
        <button onclick="document.location='category.php?new_products=1'" type="button">Nuovi arrivi</button>
        <?php echo newProductScroll($new_products)?>
    </section>

    <button onclick="document.location='new_product.php?type=custom'" type="button">Crea</button>

    <section>
        <button onclick="document.location='category.php?discounted=1'" type="button">Saldi</button>
        <?php echo discountedProductScroll($discount_products)?>      
    </section>

    <button onclick="document.location='size.php?size=3'" type="button">Dimensioni</button>

    