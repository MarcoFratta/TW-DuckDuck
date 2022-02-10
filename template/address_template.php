<?php 
    $addresses = $db->addresses()->getAddresses();
?>
<section>
    <h2>Seleziona il punto di consegna</h2>
    <form id="addresses" method="POST" action="cards.php">
        <?php foreach($addresses as $address): ?>
            <div class="address">
                <div><label for="<?php echo $address->getId() ?>">
                    <h3><?php echo $address->getStreet() ?>, <?php echo $address->getHousenumber() ?></h3>
                    <h4><?php echo $address->getDetails() ?></h4>
                </label></div>
                <input type="radio" id="<?php echo $address->getId() ?>" name="address" value="<?php echo $address->getId() ?>" checked/>
            </div>
        <?php endforeach; ?>

        <input type="submit" value="Prosegui"/>
    </form>
</section>
