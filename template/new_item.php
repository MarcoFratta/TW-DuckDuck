<?php 

    $layers = 4;

?>

<article>
    <form method="POST"  enctype="multipart/form-data" action="add_product.php?type=item">
        <div class="box">
            <div class="container">
                <h3>Nome</h3>
                <label for="name" hidden>Nome</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="container">
                <h3>Prezzo €</h3>
                <label for="price" hidden>Prezzo</label>
                <input type="number" name="price" id="price" step="0.01" min="0" required>
            </div>
            <div class="center">
                <label for="img" hidden>Immagine</label>
                <input type="file" name="img" id="img" required>
            </div>
            <div class="container">
                <label for="lay" id="layer">Strato</label>
                <select name="layer" id="lay">
                    <?php 
                        for($i=1; $i <= $layers ; $i ++){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="container">
                <button type="submit">Aggiungi</button>
            </div>
    </form>
</article>
