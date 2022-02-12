<?php 

    $categories = $db->categories()->getCategories();
    $dimensions = $db->products()->getDimensions();

?>

<article>
    <form method="POST"  enctype="multipart/form-data" action="add_product.php?type=normal">
        <div class="box">
                <div class="container">
                    <h3>Nome</h3>
                    <input type="text" name="name" required>
                </div>
                <div class="container">
                    <h3>€</h3>
                    <input type="number" name="price" step="0.01" min="0" required>
                </div>
                <div class="container">
                    <h3>Sconto %</h3>
                    <input type="number" name="discount" min="0" max="100">
                </div>
                <div class="container">
                    <h3>Quantità</h3>
                    <input type="number" min="0" id="amount" name="amount" required>
                </div>
            <div class="center">
                <input type="file" name="img">
            </div>
            <div class="container">
                <label for="dim" id="dimension">Dimensione</label>
                <select name="dim">
                    <?php 
                        foreach($dimensions as $dimension){
                            echo '<option value="'.$dimension->getId().'">'.$dimension->getSize().'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="container">
                <label for="category" id="category">Categoria</label>
                <select name="category">
                    <?php 
                        foreach($categories as $category){
                            echo '<option value="'.$category->getId().'">'.$category->getName().'</option>';
                        }
                    ?>
                </select>
            </div>
            <h3>Descrizione</h3>
            <div class="container">
                <textarea name="desc" cols="80" rows="5"></textarea>
            </div>
            <div class="container">
                <button type="submit">Aggiungi</button>
            </div>
    </form>
</article>