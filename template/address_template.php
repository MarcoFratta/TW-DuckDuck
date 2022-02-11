<?php 
    $addresses = $db->addresses()->getAddresses();
?>
<section>
    <form id="addresses" method="POST" action="cards.php">
    <h2>Seleziona il punto di consegna</h2>
        <?php foreach($addresses as $address): ?>
            <div class="address">
                <label for="<?php echo $address->getId() ?>">
                    <h3><?php echo $address->getStreet() ?>, <?php echo $address->getHousenumber() ?></h3>
                    <h4><?php echo $address->getDetails() ?></h4>
                </label>
                <input type="radio" id="<?php echo $address->getId() ?>" name="address" value="<?php echo $address->getId() ?>"/>
            </div>
        <?php endforeach; ?>

        <input type="button" value="Prosegui" onclick="check()"/>
    </form>
</section>
