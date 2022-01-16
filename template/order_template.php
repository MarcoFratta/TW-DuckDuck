<?php 
    $id = $_SESSION['id'];
    $orders = $db->orders()->getOrdersByClient($id);
?>
<h1>Ordini</h1>
<section id="orders">
    <?php foreach($orders as $order): ?>

        <h3><?php echo $order->getId() ?></h3> 
        <h5>Data di esecuzione: <?php echo $order->getDate() ?></h5>
        <p>----------------------</p>
        <h5>Stato dell'ordine: <?php echo $order->getStatus() ?></h5>

    <?php endforeach; ?>
</section>


<!-- el: FOOTER -->