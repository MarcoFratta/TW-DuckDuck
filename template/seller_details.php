<?php
$seller = $db->users()->getSellerById($_SESSION['id']);
?>

<section>

    <div>
        <img src="./img/mix/svg/login_logo.svg" alt="logo">
        <div>
            <h4><?php echo $seller->getName() ?></h4>
            <p><?php echo $seller->getEmail() ?></p>
        </div>
    </div>

    <div class="container first">
        <span data-feather="shopping-bag">Busta della spesa</span>
        <h4>I miei prodotti</h4>
        <button onClick="location.href='products.php'" type="button">></button>
    </div>

    <div class="container">
        <span data-feather="database">Busta della spesa</span>
        <h4>I miei pezzi</h4>
        <button onClick="location.href='pieces.php'" type="button">></button>
    </div>

    <div class="container">
        <span data-feather="inbox">Lettera</span>
        <h4>Messaggi</h4>
        <button onClick="location.href='messages.php'" type="button">></button>
    </div>

    <div class="container_button">
        <a href="logout.php">Esci</a>
    </div>

</section>