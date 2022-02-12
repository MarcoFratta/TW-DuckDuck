<?php
    include_once "template/cart_product.php";
    $id_order = $_SESSION['id_order_details'];
    $order = $db->orders()->getOrderById($id_order);
    
    $status = $order->getStatus();
    $dimensions = toArray($db->products()->getDimensions());
?>

<section id="order_details">

<div class="container">
    <div>
        <img alt="logo" src="img/mix/svg/done.svg"
        <?php if ($status>=0) echo 'id="done"';?>>
        <h3>Elaborato</h3>
    </div>
    <div>
        <img alt="logo" src="img/mix/svg/done.svg"
        <?php if ($status>=1) echo 'id="done"';?>>
        <h3>Spedito</h3>
    </div>
    <div>
        <img alt="logo" src="img/mix/svg/done.svg"
        <?php if ($status>=2) echo 'id="done"';?>>
        <h3>Consegnato</h3>
    </div>
</div>

<?php
    if(mysqli_num_rows($db->orders()->getOrderNormalProduct($id_order)) != 0){
        $products = $db->orders()->getOrderNormalProduct($id_order);
        foreach ( $products as $normal_product):
            $product = $db->products()->getNormalProductById($normal_product['id_normal_product']);
            if(is_null($product)){
                $product =  Product::deletedProduct($normal_product['id_normal_product'],$normal_product['price']);
            } 
            echo order_product($product, "normal", $normal_product['quantity'], $dimensions); 
        endforeach; }
        
    if(mysqli_num_rows($db->orders()->getOrderCustomProduct($id_order)) != 0){
        foreach ($db->orders()->getOrderCustomProduct($id_order) as $custom_product):
            $product = $db->products()->getCustomProductById($custom_product['id_custom_product']); 
            echo order_product($product, "custom", $custom_product['quantity'], $dimensions); 
        endforeach; }
?>

<div class="box">
    <h3>Dettagli spedizione</h3>
    <div class="container">
        <h3>Data</h3>
        <h4><?php echo $order->getDate() ?></h3>
    </div>
    <div class="container">
        <h3>Corriere</h3>
        <h4>GLS</h3>
    </div>
    <div class="container">
        <h3>N. spedizione</h3>
        <h4><?php echo $id_order ?></h3>
    </div>
    <div class="container">
        <h3>Indirizzo</h3>
        <h4><?php 
            $address = $db->addresses()->getAddressById($order->getDestination());
            echo $address->getStreet() . ", " . $address->getHouseNumber();
        ?></h3>
    </div>
</div>

</section>