<?php
        require_once "utils/functions.php";

        $templateParams['title'] = "Nuova carta";
        require "template/common_top_html.php";
        require "template/header.php";
        echo '<img>
            <h1>Nuova carta</h1>
            <form method="POST" action="add_card.php" id="form">
                <input type="number" placeholder="Numero" name="number">
                <input type="month" placeholder="Scadenza" name="expire_date">
                <input type="password" placeholder="CVV" name="cvv">
                <button type="submit">Aggiungi</button>
            </form>';
            #footer
        require "template/common_bottom_html.php"
?>
