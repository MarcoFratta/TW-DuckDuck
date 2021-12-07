<?php
require_once "model/product.php";
function smallProductCard($product){
    return '<article> 
                <a href="product.php?id_product='.$product->getId().'">'.$product->getName().'</a>          
            </article>';
}
?>