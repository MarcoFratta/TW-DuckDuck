<h1>Dimensioni</h1>
    <section>

        <!--create the size view with duck images: -->
        <button type="button">-</button>
        <img>
        <img>
        <img>
        <img>
        <img>
        <button type="button">+</button>
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