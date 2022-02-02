<?php
    $id_order = $_SESSION['id_order_details'];
    $order = $db->orders()->getOrderById($id_order);
?>

<h1>Dettagli ordine</h1>
<section id="notifications">
    <h2>Stato dell'ordine: <?php echo $order->getStatus() ?></h2>
    <h3>Prodotti normali: </h3>
    <?php
        foreach ($db->orders()->getOrderNormalProduct($id_order) as $normal_product):
            $product = $db->products()->getNormalProductById($normal_product['id_normal_product']); 
    ?>
            <section>
                <h4><?php echo $product->getName() ?></h5>
                <p>Dimensione: <?php echo $product->getDimension() ?></p>
                <p>Quantità:<?php echo $normal_product['quantity'] ?></p>
                <p>Prezzo cad.: &euro;<?php echo $normal_product['price']/$normal_product['quantity'] ?></p>
            </section>
    <?php endforeach; ?>

    <h3>prodotti personalizzati: </h3>
    <?php
        foreach ($db->orders()->getOrderCustomProduct($id_order) as $custom_product):
            $product = $db->products()->getCustomProductById($custom_product['id_custom_product']); 
    ?>
            <section>
                <h4><?php echo $product->getName() ?></h5>
                <p>Dimensione: <?php echo $product->getDimension() ?></p>
                <p>Quantità:<?php echo $custom_product['quantity'] ?></p>
                <p>Prezzo cad.: &euro;<?php echo $custom_product['price']/$custom_product['quantity'] ?></p>
            </section>
    <?php endforeach; ?>

    <h3>Dettagli spedizione</h3>
    <h4>Data: <?php echo $order->getDate() ?></h4>
    <h4>No. spedizione: <?php echo $id_order ?></h3>
    <h4>Corriere: GLS</h4>
    <h4>Indirizzo:
        <?php 
            #da fare
        ?>
    </h4>
    
        
</section>