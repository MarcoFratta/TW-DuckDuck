<?php
require_once "model/product.php";
function cartProduct($product, $type, $quantity){
    return '<article> 
                <a href="product.php?id_product='.$product->getId().'">'.$product->getName().'</a>
                <p>$'.$product->getPrice().'</p>  
                <p>quantitá :'.$quantity.'</p>  
                <button>+</button> 
                <button>-</button>     
            </article>';
}
?>