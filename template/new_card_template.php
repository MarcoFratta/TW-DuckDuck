<?php
    $client = $db->users()->getClientById($_SESSION['id']);
?>
<section>

  <form id="new_card" method="POST" action="add_card.php">

    <div class="container">
      <label for="number">Numero della carta</label>
    </div>

    <div class="container">
      <input type="text" id="number" name="number"
      placeholder="XXXX XXXX XXXX XXXX" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" required>
    </div>

    <div class="container">
      <label for="expire_date">Data di scadenza</label>
      <label for="cvv">CVV</label>
    </div>

    <div class="container">
      <input type="text" id="expire_date" name="expire_date" placeholder="mm/aa" pattern="[0-1]{1}[0-9]{1}/2[2-9]{1}" required>
      <input type="password" id="cvv" name="cvv" placeholder="XXX" pattern="[0-9]{3}" required>
    </div>

    <input type="hidden" id="client_id" name="client_id" value="<?php echo $client->getId() ?>" readonly>

    <input type="submit" value="Aggiungi">
  </form>

</section>