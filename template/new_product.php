<?php 

    $categories = $db->categories()->getCategories();
    $dimensions = $db->products()->getDimensions();

?>

<article>
    <form method="POST"  enctype="multipart/form-data" action="add_product.php?type=normal">
        <div class="box">
                <div class="container">
                    <h3>Nome</h3>
                    <label for="name" hidden>Nome</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="container">
                    <h3>Prezzo €</h3>
                    <label for="price" hidden>Prezzo</label>
                    <input type="number" name="price" step="0.01" min="0" id="price" required>
                </div>
                <div class="container">
                    <h3>Sconto %</h3>
                    <label for="discount" hidden>Sconto</label>
                    <input type="number" name="discount" id="discount" min="0" max="100">
                </div>
                <div class="container">
                    <h3>Quantità</h3>
                    <label for="amount" hidden>Quantità</label>
                    <input type="number" min="0" id="amount" name="amount" required>
                </div>
            <div class="center">
                <label for="img" hidden>Immagine</label>
                <input type="file" name="img" id="img">
            </div>
            <div class="container">
                <label for="dim" id="dimension">Dimensione</label>
                <select name="dim" id="dim">
                    <?php 
                        foreach($dimensions as $dimension){
                            echo '<option value="'.$dimension->getId().'">'.$dimension->getSize().'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="container">
                <label for="cat" id="category">Categoria</label>
                <select name="category" id="cat">
                    <?php 
                        foreach($categories as $category){
                            echo '<option value="'.$category->getId().'">'.$category->getName().'</option>';
                        }
                    ?>
                </select>
            </div>
            <h3>Descrizione</h3>
            <div class="container">
                <label for="desc" hidden>Descrizione</label>
                <textarea name="desc" id="desc" cols="80" rows="5"></textarea>
            </div>
            <div class="container">
                <button type="submit">Aggiungi</button>
            </div>
    </form>
</article>