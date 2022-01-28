<?php 
    $addresses = $db->addresses()->getAddresses();
?>
<h1>Indirizzo di consegna</h1>

<form id="addresses" method="POST" action="cards.php">
    <?php foreach($addresses as $address): ?>
        <input type="radio" name="address" value="<?php echo $address->getId() ?>" checked>
        <?php echo $address->getCity().", ".$address->getStreet().", ".$address->getHousenumber().", ".$address->getDetails() ?>
    <?php endforeach; ?>

    <input type="submit" value="Prosegui">
</form>

<!-- el: FOOTER -->