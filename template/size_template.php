<h1>Dimensioni</h1>
    <section>

        <!--create the size view with duck images: -->
        <form method="GET" action="size.php">
        <input type="hidden" name="size" value="<?php echo $dimension->getSize()!=1 ? $dimension->getSize()-1: 1?>"/>
            <input type="submit" value="-" />
        </form>
        <img>
        <img>
        <img>
        <img>
        <img>
        <form method="GET" action="size.php">
            <input type="hidden" name="size" value="<?php echo $dimension->getSize()!=5 ? $dimension->getSize()+1: 5?>"/>
            <input type="submit" value="+" />
        </form>
        <h3><?php echo $dimension->getName()?></h3>
        <img>

        <section>
            <h4>Altezza: </h4>
            <h4 name="height"><?php echo $dimension->getHeight()?> cm</h4>
            <h4>Larghezza: </h4>
            <h4 name="width"><?php echo $dimension->getWidth()?> cm</h4>
            <h4>Lunghezza: </h4>
            <h4 name="length"><?php echo $dimension->getDepth()?>cm</h4>
        </section>

    </section>