<?php
$client = $db->users()->getClientById($_SESSION['id']);
$gender = $client->getSex();
?>
<section>
      
    <img src="./img/front_duck.png" >
    <h4><?php echo $client->getName() ?></h4>
    <p><?php echo $client->getEmail() ?></p>

    <div class="container first">
        <i data-feather="shopping-bag">Busta della spesa</i>
        <h4>Ordini</h4>
        <a href="orders.php">
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

    <div class="container">
        <i data-feather="credit-card">Carta di credito</i>
        <h4>Metodi di pagamento</h4>
        <a href="cards.php">
            <button type="button">></button>
        </a>
    </div>

    <form action="./edit_details.php" method="get">
        <div class="container first">
            <i data-feather="tool">Sesso</i>
            <h4>Sesso</h4>
            <select name="gender" id="type">
                <?php echo is_null($gender) ? '<option value="Non Specificato" hidden disabled selected>' : '' ?>non specificato</option>
                <?php echo $gender == "Uomo" ? '<option value="Uomo" selected>' : '<option value="Uomo">' ?>Uomo</option>
                <?php echo $gender == "Donna" ? '<option value="Donna" selected>' : '<option value="Donna">' ?>Donna</option>
            </select>
        </div>

        <div class="container">
            <i data-feather="phone">Cellulare</i>
            <h4>Cellulare</h4>
            <input type="tel" name="phone" placeholder="<?php echo $client->getPhone() !== null ? $client->getPhone() : '333-3333-3333' ?>"
            name="cel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        </div>

        <div class="container_buttons">
            <input type="submit" name="Salva" value="Salva"/>
            <a href="logout.php">
                <button type="button">Esci</button>
            </a>
        </div>
    </form>

</section>