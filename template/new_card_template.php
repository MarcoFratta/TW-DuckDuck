<?php
    $client = $db->users()->getClientById($_SESSION['id']);
?>
<h1>Nuova carta</h1>
<form id="new_card" method="POST" action="add_card.php">
  <label for="number">Numero:</label>
  <input type="number" id="number" name="number" placeholder="XXXXXXXXXXXXXXXX">
  <label for="expire_date">Scadenza:</label>
  <input type="text" id="expire_date" name="expire_date" placeholder="mm/aa">
  <label for="cvv">CVV:</label>
  <input type="number" id="cvv" name="cvv" placeholder="XXX">
  <label for="client_id">ID Utente:</label>
  <input type="number" id="client_id" name="client_id" value="<?php echo $client->getId() ?>" readonly>

  <input type="submit" value="Aggiungi carta">
</form>

<button type="button" onclick="history.back()">Indietro</button>

<!-- el: FOOTER -->