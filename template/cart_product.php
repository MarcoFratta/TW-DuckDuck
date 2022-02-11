<?php
require_once "model/product.php";
require_once "template/common.php";
function cart_product($product, $type, $quantity, $dimensions)
{
    $dim = getProductSize($product, $dimensions);
    if ($type == "normal") {
        return '<article id="' . $product->getId() . '"> 
                <img onClick="location.href=' . ("'product.php?id_product=" . $product->getId()) ."'". '" alt="prodotto" src="' . $product->getImagePath() . '"/>
                <div>
                    <h3>' . $product->getName() . '</h3>
                    ' . displaySize($dim,$product->getId()) . '
                    <h4>€' . number_format((float)productPriceWithDiscount($product),2,',',''). '</h4>  
                </div>
                <div>
                    <img alt="heart" src="./img/mix/empty_heart.png"/>
                    <div>
                    <form action="update_cart.php?action=sub" method="post">
                        <input type="hidden" name="product_id" value="' . $product->getId() . '">
                        <input type="hidden" name="type" value="' . $type . '">
                        <button type="submit">-</button> 
                    </form>
                    <h3>' . $quantity . '</h3> 
                    <form action="update_cart.php?action=add" method="post">
                        <input type="hidden" name="product_id" value="' . $product->getId() . '">
                        <input type="hidden" name="type" value="' . $type . '">
                        <button type="submit">+</button> 
                    </form>                       
                </div>                       
            </article>';
    } else if ($type == "custom") {
        return '<article id="' . $product->getId() . '">
        <img class="custom_product"  alt="prodotto" src="img/mix/paperella-di-gomma-gialla-classica.png"/>
        <div>
                <h3>Creato da te</h3>
                ' . displaySize($dim,$product->getId()) . '
                <h4>€' . number_format((float)productPriceWithDiscount($product),2,',','') . '</h4>
        </div>
        <div>
            <img alt="heart" src="./img/mix/empty_heart.png"/>
            <div> <form action="update_cart.php?action=sub" method="post">
                <input type="hidden" name="product_id" value="' . $product->getId() . '">
                <input type="hidden" name="type" value="' . $type . '">
                <button type="submit">-</button> 
            </form> 
            <h3>' . $quantity . '</h3> 
            <form action="update_cart.php?action=add" method="post">
                <input type="hidden" name="product_id" value="' . $product->getId() . '">
                <input type="hidden" name="type" value="' . $type . '">
                <button type="submit">+</button> 
            </form>             
        </div>          
    </article>';
    }
}
