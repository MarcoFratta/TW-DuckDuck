<?php
    $client = $db->users()->getClientById($_SESSION['id']);
    $cards = $db->cards()->getClientCards($client->getId());
?>
<h1>Metodo di pagamento</h1>
<section id="cards">
    <?php foreach($cards as $card): ?>
        <input type="radio" id="<?php echo $card->getId() ?>" name="card" value="<?php echo $card->getId() ?>" checked>
        <label for="<?php echo $card->getId() ?>"><?php echo 
            "Titolare: ".$card->getClient().", "
            ."Numero: ".$card->getNumber().", "
            ."Data di scadenza: ".$card->getExpire_date().", " ?></label>
    <?php endforeach; ?>
</section>

<button type="button" onclick="document.location='new_card.php'">Aggiungi carta</button>
<button type="button">Prosegui</button>

<!-- el: FOOTER -->