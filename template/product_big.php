<?php
require_once "model/product.php";    
?>
<article> 
    <h1>
        <?php echo $product->getName()?> 
    </h1>
    <p>
        <?php echo $product->getDescription();?> 
    </p>  
    <h3>
        <?php echo "Amount -> ".$product->getAmount();?> 
    </h3>             
</article>