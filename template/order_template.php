<?php 
    $id = $_SESSION['id'];
    $orders = $db->orders()->getOrdersByClient($id);
?>
<h1>Ordini</h1>
<section id="orders">
    <p>----------------------</p>
    <?php foreach($orders as $order): ?>

        <h5>ID ordine: <?php echo $order->getID() ?></h5>
        <h5>Data di esecuzione: <?php echo $order->getDate() ?></h5>
        <h5>Stato dell'ordine: <?php echo $order->getStatus() ?></h5>
        <p>----------------------</p>

    <?php endforeach; ?>
</section>

<!-- el: FOOTER -->