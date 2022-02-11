<?php
    $client = $db->users()->getClientById($_SESSION['id']);
    if (isset($_SESSION['total'])) {
        $total = $_SESSION['total'];
    }
    $cards = $db->cards()->getClientCards($client->getId());
?>

<section>

    <form id="cards" method="POST" action="completed.php">
        <?php foreach($cards as $card): ?>
            <div class="card">
                <input type="radio" name="card" value="<?php echo $card->getId() ?>" checked>
                <?php echo 
                    "<h4>" . $card->getNumber() . "</h4>"
                    . '<div class="container">
                    <img><img src="./img/mix/svg/mastercard.svg"><h5>' . $card->getExpire_date()
                    . '</h5></div>';
                ?>
            </div>
        <?php endforeach; ?>

        <button type="button" onclick="document.location='new_card.php'">Aggiungi carta</button>
        <input type="submit" <?php if(!isset($_SESSION['total']) || !isset($_SESSION['address'])) {?> style="display: none" <?php } ?> value="Paga €<?php echo $total?>">
    </form>

</section>