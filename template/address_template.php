<?php 
    $addresses = $db->addresses()->getAddresses();
    $idChecked = null;
?>
<h1>Indirizzo di consegna</h1>
<section id="addresses">
    <?php foreach($addresses as $address): ?>
        <input type="radio" id="<?php echo $address->getId() ?>" name="address" value="<?php echo $address->getId() ?>" checked>
        <label for="<?php echo $address->getId() ?>"><?php echo $address->getCity().", ".$address->getStreet().", ".$address->getHousenumber().", ".$address->getDetails() ?></label>
    <?php endforeach; ?>
</section>

<button type="button" onclick="document.location='cards.php'">Prosegui</button>

<!-- el: FOOTER -->