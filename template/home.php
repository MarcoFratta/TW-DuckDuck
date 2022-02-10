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

    <img id="freccia" onclick="document.location='#freccia'" alt="freccia scorrimento" src="img/mix/svg/home_arrow.svg"/>

    <button id="categories" onclick="document.location='categories.php'" type="button">Categorie</button>
    
    <section>
        <button onclick="document.location='category.php?new_products=1'" type="button">Nuovi arrivi</button>
        <div>
            <?php echo newProductScroll($new_products)?>
        </div>
        
    </section>

    <button onclick="document.location='new_product.php?type=custom'" type="button">Crea</button>

    <section>
        <button onclick="document.location='category.php?discounted=1'" type="button">Saldi</button>
        <div>
            <?php echo discountedProductScroll($discount_products)?>      
        </div>
    </section>

    <button onclick="document.location='size.php?size=3'" type="button">Dimensioni</button>

    