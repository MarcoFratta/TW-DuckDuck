<?php
$seller = $db->users()->getSellerById($_SESSION['id']);
?>

<section>

    <div>
        <img src="./img/mix/svg/login_logo.svg">
        <div>
            <h4><?php echo $seller->getName() ?></h4>
            <p><?php echo $seller->getEmail() ?></p>
        </div>
    </div>

    <div class="container first">
        <i data-feather="shopping-bag">Busta della spesa</i>
        <h4>I miei prodotti</h4>
        <button onClick="location.href='products.php'" type="button">></button>
    </div>

    <div class="container">
        <i data-feather="inbox">Lettera</i>
        <h4>Messaggi</h4>
        <button onClick="location.href='messages.php'" type="button">></button>
    </div>

    <div class="container_button">
        <a href="logout.php">Esci</a>
    </div>

</section>