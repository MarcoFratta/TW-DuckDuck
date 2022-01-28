<?php
    $client = $db->users()->getClientById($_SESSION['id']);
    $cards = $db->cards()->getClientCards($client->getId());
?>
<h1>Metodo di pagamento</h1>

<form id="cards" method="POST" action="completed.php">
    <?php foreach($cards as $card): ?>
        <input type="radio" name="card" value="<?php echo $card->getId() ?>" checked>
        <?php echo 
            "Titolare: ".$client->getName().", "
            ."Numero: ".$card->getNumber().", "
            ."Data di scadenza: ".$card->getExpire_date().", "
        ?>
    <?php endforeach; ?>

    <input type="submit" value="PAGA">
</form>

<button type="button" onclick="document.location='new_card.php'">Aggiungi carta</button>


<!-- el: FOOTER -->