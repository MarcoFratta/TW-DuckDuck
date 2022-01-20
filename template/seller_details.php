<?php
$seller = $db->users()->getSellerById($_SESSION['id']);
?>

<section>

    <div>
        <!-- info alte -->
        <img> <!-- papera -->
        <h3><?php echo $seller->getName() ?></h3>
        <h4><?php echo $seller->getEmail() ?></h4>
    </div>

    <div>
        <i>Lock</i>
        <h4>Modifica Password</h4>
        <button type="button">'>'</button>
    </div>

    <div>
        <i>Busta</i>
        <h4>Prodotti</h4>
        <form action="products.php">
            <input type="submit" value=">" />
        </form>
    </div>
    <div>
        <form action="logout.php">
            <input type="submit" value="Esci" />
        </form>
    </div>

</section>