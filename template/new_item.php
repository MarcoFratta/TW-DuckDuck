<?php 

    $layers = 4;

?>

<article>
    <form method="POST"  enctype="multipart/form-data" action="add_product.php?type=item">
        <div class="box">
            <div class="container">
                <div>
                    <div class="container">
                        <h3>Nome</h3>
                        <input type="text" name="name">
                    </div>
                    <div class="container">
                        <h3>€</h3>
                        <input type="number" name="price" step="0.01" min="0">
                    </div>
                </div>
            </div>
            <div class="center">
                <input type="file" name="img">
            </div>
            <div class="container">
                <label for="layer" id="layer">Strato</label>
                <select name="layer">
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
