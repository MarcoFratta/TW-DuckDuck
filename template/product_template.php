<?php
require_once "model/product.php";
function smallProductCard($product){
    return "<article>           
             {$product->getName()}; 
            </article>";
}
?>