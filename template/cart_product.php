<?php
require_once "model/product.php";
function cart_product($product, $type, $quantity)
{
    return '<article id="'.$product->getId().'"> 
                <a href="product.php?id_product=' . $product->getId() . '">' . $product->getName() . '</a>
                <p>$' . ($product->getPrice() / 100) . '</p>  
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
