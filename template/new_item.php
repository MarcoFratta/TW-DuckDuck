<?php 

    $layers = 3;

?>

<h1>Nuovo prodotto</h1>

    <form method="POST"  enctype="multipart/form-data" action="add_product.php?type=item">
        <h3>Nome</h3>
        <input type="text" name="name">
        
        <h3>Immagine</h3>
        <input type="file" name="img">

        <label for="layer" id="layer">Strato</label>
            <select name="layer">
                <?php 
                    for($i=1; $i <= $layers ; $i ++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>
        <h3>Prezzo</h3>
        <input type="number" name="price" step="0.01" min="0">
        <button type="submit">Aggiungi</button>
    </form>