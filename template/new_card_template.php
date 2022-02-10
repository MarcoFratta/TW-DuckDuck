<?php
    $client = $db->users()->getClientById($_SESSION['id']);
?>
<h1>Nuova carta</h1>
<form id="new_card" method="POST" action="add_card.php">
  <label for="number">Numero:</label>
  <input type="text" id="number" name="number"
  placeholder="XXXX XXXX XXXX XXXX" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" required>
  <label for="expire_date">Scadenza:</label>
  <input type="text" id="expire_date" name="expire_date" placeholder="mm/aa" pattern="[0-1]{1}[0-9]{1}/2[2-9]{1}" required>
  <label for="cvv">CVV:</label>
  <input type="number" id="cvv" name="cvv" placeholder="XXX" pattern="[0-9]{3}" required>
  <label for="client_id">ID Utente:</label>
  <input type="number" id="client_id" name="client_id" value="<?php echo $client->getId() ?>" readonly>

  <input type="submit" value="Aggiungi carta">
</form>