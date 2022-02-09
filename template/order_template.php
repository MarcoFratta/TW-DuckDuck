<?php 
    $id = $_SESSION['id'];
    $orders = $db->orders()->getOrdersByClient($id);
?>
<section>
    <form id="orders" method="POST" action="order_details.php">
        <?php foreach($orders as $order): ?>

            <div class="box">
                <div class="container">
                    <h4>Ordine n. <?php echo $order->getId() ?></h4>
                    <button type="submit" name="order_details" value="<?php echo $order->getId() ?>"><h4>></h4></button>
                </div>
                <div class="container">
                    <h3>Data di esecuzione: </h3>
                    <h5><?php echo $order->getDate() ?></h5>
                </div>
                <div class="container">
                    <h3>Stato: </h3>
                    <h5><?php echo $order->getStatus() ?></h5>
                </div>
                <div class="container">
                    <h3>Numero prodotti: </h3>
                    <h5><?php
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
                    ?></h5>
                </div>
                <div class="container">
                    <h3>Prezzo: </h3>
                    <h5>
                    <?php
                        $amount = 0;
                        foreach ($db->orders()->getOrderNormalProduct($order->getId()) as $product) {
                            if ($product != null) {
                                $amount += ($product['price']*$product['quantity'])/100;
                            }
                        }
                        foreach ($db->orders()->getOrderCustomProduct($order->getId()) as $product) {
                            if ($product != null) {
                                $amount += ($product['price']*$product['quantity'])/100;
                            }
                        }
                        echo "&euro;".number_format((float)$amount, 2, ',', '');
                    ?>
                    </h5>
                </div>

            </div>

        <?php endforeach; ?>
    </form>
</section>
