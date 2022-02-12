<?php 
    $id = $_SESSION['id'];
    $orders = $db->orders()->getOrdersByClient($id);
?>
<section>

    <?php
        if (count(iterator_to_array($db->orders()->getOrdersByClient($id), false)) == 0) {
            require "template/empty_orders_template.php";
            return;
        }
    ?>

    <form id="orders" method="POST" action="order_details.php">

        <?php foreach($orders as $order): ?>

            <div class="box">
                <div class="container">
                    <h3>Ordine n. <?php echo $order->getId() ?></h3>
                    <button type="submit" name="order_details" value="<?php echo $order->getId() ?>"><h3>></h3></button>
                </div>
                <div class="container">
                    <h4>Data di esecuzione: </h4>
                    <h5><?php echo $order->getDate() ?></h5>
                </div>
                <div class="container">
                    <h4>Stato: </h4>
                    <h5><?php switch ($order->getStatus()) {
                        case 0:
                          echo "Elaborato";
                          break;
                        case 1:
                            echo "Spedito";
                          break;
                        case 2:
                            echo "Consegnato";
                          break;
                        default:
                            echo "Errore";
                      } ?></h5>
                </div>
                <div class="container">
                    <h4>Numero prodotti: </h4>
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
                    <h4>Prezzo: </h4>
                    <h5>
                    <?php
                        $amount = 0;
                        foreach ($db->orders()->getOrderNormalProduct($order->getId()) as $product) {
                            if ($product != null) {
                                $amount += ($product['price']/100)*$product['quantity'];
                            }
                        }
                        foreach ($db->orders()->getOrderCustomProduct($order->getId()) as $product) {
                            if ($product != null) {
                                $amount += ($product['price']/10000)*$product['quantity'];
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
