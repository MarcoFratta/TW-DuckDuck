<?php
require_once "model/product.php";
require_once "template/common.php";
function cart_product($product, $type, $quantity,$dimensions)
{
    $dim = getProductSize($product,$dimensions);
    if($type == "normal"){
        return '<article id="'.$product->getId().'"> 
                <img onClick="location.href='.("'product.php?id_product=". $product->getId()).'" alt="prodotto" src="'.$product->getImagePath().'"/>
                <div>
                    <h3>' . $product->getName() . '</h3>
                    '.displaySize($dim).'
                    <h4>€' . productPriceWithDiscount($product) . '</h4>  
                </div>
                <div>
                    <img alt="heart" src="../img/mix/empty_heart.png"/>
                    <div>
                    <form action="update_cart.php?action=add" method="post">
                        <input type="hidden" name="product_id" value="' . $product->getId() . '">
                        <input type="hidden" name="type" value="' . $type . '">
                        <button type="submit">+</button> 
                    </form>
                    <h3>' . $quantity . '</h3> 
                    <form action="update_cart.php?action=sub" method="post">
                        <input type="hidden" name="product_id" value="' . $product->getId() . '">
                        <input type="hidden" name="type" value="' . $type . '">
                        <button type="submit">-</button> 
                    </form>        
                </div>
                </div>                       
            </article>';
    } else if ($type == "custom"){
        return '<article id="'.$product->getId().'">
                <h1>Creato da te</h1>
                <a href="product.php?id_product=' . $product->getId() . '">' . $product->getName() . '</a>
                <p>$' . productPriceWithDiscount($product) . '</p>  
                <p>quantitá :' . $quantity . '</p> 
                <form action="update_cart.php?action=add" method="post">
                    <input type="hidden" name="product_id" value="' . $product->getId() . '">
                    <input type="hidden" name="type" value="' . $type . '">
                    <button type="submit">+</button> 
                </form>
                <form action="update_cart.php?action=sub" method="post">
                    <input type="hidden" name="product_id" value="' . $product->getId() . '">
                    <input type="hidden" name="type" value="' . $type . '">
                    <button type="submit">-</button> 
                </form>                  
            </article>';
    }
}
