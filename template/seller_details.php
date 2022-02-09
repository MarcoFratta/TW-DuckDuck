<?php
$seller = $db->users()->getSellerById($_SESSION['id']);
?>

<section>

    <img src="./img/front_duck.png" >
    <h4><?php echo $seller->getName() ?></h4>
    <p><?php echo $seller->getEmail() ?></p>

    <div class="container first">
        <i data-feather="shopping-bag">Busta della spesa</i>
        <h4>Prodotti</h4>
        <a href="products.php">
            <button type="button">></button>
        </a>
    </div>

    <div class="container">
        <i data-feather="inbox">Lettera</i>
        <h4>Messaggi</h4>
        <a href="messages.php">
            <button type="button">></button>
        </a>
    </div>

    <div class="container_buttons">
        <a href="logout.php">
            <button type="button">Esci</button>
        </a>
    </div>

</section>