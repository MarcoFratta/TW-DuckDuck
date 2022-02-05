<?php
$client = $db->users()->getClientById($_SESSION['id']);
?>
<section>
    <div>
        <!-- info alte -->
        <img> <!-- papera -->
        <h3><?php echo $client->getName() ?></h3>
        <h4><?php echo $client->getEmail() ?></h4>
    </div>

    <form action="./edit_details.php" method="get">
        <div>
            <i>Sesso</i>
            <h4>Sesso</h4>
            <input type="text" name="gender" placeholder="<?php echo $client->getSex() !== null ? $client->getSex() : 'non specificato' ?>" name="gender">
        </div>

        <div>
            <i>Cellulare</i>
            <h4>Cellulare</h4>
            <input type="text" name="phone" placeholder="<?php echo $client->getPhone() !== null ? $client->getPhone() : 'non specificato' ?>" name="cel">
        </div>
        <input type="submit" name="Salva" value="Salva"/>
    </form>
    

    <div>
        <button id="logout">Esci</button>
        <script>
            var btn = document.getElementById('logout');
            btn.addEventListener('click', function() {
                document.location.href = "logout.php";
            });
        </script>
    </div>

    <div>
        <i>Lock</i>
        <h4>Modifica Password</h4>
        <button type="button">'>'</button>
    </div>

    <div>
        <i>Busta</i>
        <h4>Ordini</h4>
        <a href="orders.php">
            <button type="button">'>'</button>
        </a>
    </div>

    <div>
        <i>Lettera</i>
        <h4>Messaggi</h4>
        <a href="messages.php">
            <button type="button">'>'</button>
        </a>
    </div>

    <div>
        <i>Carta</i>
        <h4>Metodi di pagamento</h4>
        <a href="cards.php">
            <button type="button">'>'</button>
        </a>
    </div>

    <button type="button">Salva</button>
</section>