<section>
    <h3><?php echo $dimension->getName()?></h3>
    <img src="./img/dimensions.png">
    <section id="size_selector">
        <div>
        <input type="hidden" id="actual" value="<?php echo $dimension->getSize()?>"/>
            <form method="GET" action="size.php">
                <input type="hidden" name="size" value="<?php echo $dimension->getSize()!=1 ? $dimension->getSize()-1: 1?>"/>
                <button id="decrease" type="submit">-</button>
            </form><div>
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo '<img alt="" src="./img/mix/svg/dimension-duck.svg" id="';
                    echo $dimension->getSize()<$i ? "disabled" : "";
                    echo '"/>';
            }?></div>
            <form method="GET" action="size.php">
                <input type="hidden" name="size" value="<?php echo $dimension->getSize()!=5 ? $dimension->getSize()+1: 5?>"/>
                <button id="increase" type="submit">+</button>
            </form>
        </div>
    </section>

    
   

    <section class="box">
        <div class="container">
            <h4 id="purple">Altezza: </h4>
            <h4 name="height"><?php echo $dimension->getHeight()?> cm</h4>
        </div>
        <div class="container">
            <h4 id="green">Larghezza: </h4>
            <h4 name="width"><?php echo $dimension->getWidth()?> cm</h4>
        </div>
        <div class="container">
            <h4 id="red">Lunghezza: </h4>
            <h4 name="length"><?php echo $dimension->getDepth()?> cm</h4>
        </div>
    </section>

</section>