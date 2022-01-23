<?php 

    $categories = $db->categories()->getCategories();
    $dimensions = $db->products()->getDimensions();

?>

<h1>Nuovo prodotto</h1>

    <form method="POST"  enctype="multipart/form-data" action="add_product.php?type=normal">
        <h3>Nome</h3>
        <input type="text" name="name">
        
        <h3>Immagine</h3>
        <input type="file" name="img">

        <label for="dim" id="dimension">Dimensione</label>
            <select name="dim">
                <?php 
                    foreach($dimensions as $dimension){
                        echo '<option value="'.$dimension->getId().'">'.$dimension->getSize().'</option>';
                    }
                ?>
            </select>

        <h3>Prezzo</h3>
        <input type="number" name="price" step="0.01" min="0">

        <h3>Descrizione</h3>
        <input type="text" name="desc">

        <h3>Sconto</h3>
        <input type="number" name="discount" min="0" max="100">

        <label for="amount">Unità disponibili</label>
        <input type="number" min="0" id="amount" name="amount">

        <label for="category" id="category">Categoria</label>
            <select name="category">
                <?php 
                    foreach($categories as $category){
                        echo '<option value="'.$category->getId().'">'.$category->getName().'</option>';
                    }
                ?>
            </select>
        <button type="submit">Aggiungi</button>
    </form>