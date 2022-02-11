<?php
$client = $db->users()->getClientById($_SESSION['id']);
$gender = $client->getSex();
?>
<section>
    <div>
        <img src="./img/mix/svg/login_logo.svg">
        <div>
            <h4><?php echo $client->getName() ?></h4>
            <p><?php echo $client->getEmail() ?></p>
        </div>
    </div>

    <div class="container first">
        <i data-feather="shopping-bag">Busta della spesa</i>
        <h4>Ordini</h4>
        <button onClick="location.href='orders.php'" type="button">></button>
    </div>

    <div class="container">
        <i data-feather="inbox">Lettera</i>
        <h4>Messaggi</h4>
        <button onClick="location.href='messages.php'" type="button">></button>
    </div>

    <div class="container">
        <i data-feather="credit-card">Carta di credito</i>
        <h4>Metodi di pagamento</h4>
        <button onClick="location.href='cards.php'" type="button">></button>
    </div>

    <form action="./edit_details.php" method="get">
        <div class="container first">
            <svg width="24" height="24" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.00006 13C10.3138 13 13.0001 10.3137 13.0001 7C13.0001 3.68629 10.3138 1 7.00006 1C3.68635 1 1.00006 3.68629 1.00006 7C1.00006 10.3137 3.68635 13 7.00006 13Z" stroke="#9E90FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.00006 13V21" stroke="#9E90FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4.00006 17H10.0001" stroke="#9E90FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h4>Sesso</h4>
            <select name="gender" id="type">
                <?php echo is_null($gender) ? '<option value="Non Specificato" hidden disabled selected>' : '' ?>non specificato</option>
                <?php echo $gender == "Uomo" ? '<option value="Uomo" selected>' : '<option value="Uomo">' ?>Uomo</option>
                <?php echo $gender == "Donna" ? '<option value="Donna" selected>' : '<option value="Donna">' ?>Donna</option>
            </select>
        </div>

        <div class="container">
        <svg width="24" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12.625 1H1.375V19H12.625V1Z" stroke="#9E90FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M6.99437 15.625H7.00562" stroke="#9E90FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>


            <h4>Cellulare</h4>
            <input type="tel" name="phone" placeholder="<?php echo $client->getPhone() !== null ? $client->getPhone() : '333-333-3333' ?>" name="cel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        </div>

        <div class="container_buttons">
            <input type="submit" name="Salva" value="Salva" />
            <a href="logout.php">Esci</a>
        </div>
    </form>

</section>