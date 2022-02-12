<section>
    <?php
        require_once "model/category.php";
        require_once "db/database.php";
        $categories = $db->categories()->getCategories();
        foreach($categories as $category): ?>
            <button class="category" type="button" onclick="<?php echo "document.location='category.php?category=".$category->getId()."'" ?>">
                <?php echo $category->getName() ?>
                <img alt="" src="<?php echo $category->getImage() ?>"/>
            </button>
        <?php endforeach; ?>
</section>