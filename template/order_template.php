<?php 
    $id = $_SESSION['id'];
    $orders = $db->orders()->getOrdersByClient($id);
?>
<h1>Ordini</h1>
<form id="orders" method="POST" action="order_details.php">
    <p>----------------------</p>
    <?php foreach($orders as $order): ?>

        <h5>ID ordine: <?php echo $order->getId() ?></h5>
        <h5>Data di esecuzione: <?php echo $order->getDate() ?></h5>
        <h5>Stato dell'ordine: <?php echo $order->getStatus() ?></h5>
        <h5>N. prodotti:
            <?php
                $amount = 0;
                foreach ($db->orders()->getOrderNormalProduct($order->getId()) as $product) {
                    if ($product != null) {
                        $amount += $product['quantity'];
                    }
                }
                foreach ($db->orders()->getOrderCustomProduct($order->getId()) as $product) {
                    if ($product != null) {
                        $amount += $product['quantity'];
                    }
                }
                echo $amount;
            ?>
        </h5>
        <h5>Prezzo:
            <?php
                $amount = 0;
                foreach ($db->orders()->getOrderNormalProduct($order->getId()) as $product) {
                    if ($product != null) {
                        $amount += $product['price'];
                    }
                }
                foreach ($db->orders()->getOrderCustomProduct($order->getId()) as $product) {
                    if ($product != null) {
                        $amount += $product['price'];
                    }
                }
                echo "&euro;".number_format((float)$amount, 2, '.', '');
            ?>
        </h5>

        <button type="submit" name="order_details" value="<?php echo $order->getId() ?>">Dettagli</button>
        <p>----------------------</p>

    <?php endforeach; ?>
</form>

<!-- el: FOOTER -->