<section>
    <?php
        require_once "model/category.php";
        require_once "db/database.php";
        $categories = $db->categories()->getCategories();
        foreach($categories as $category){
            echo "<article>
                    ".('<a href="category.php?category='.$category->getId().'">'.$category->getName().'</a>')."
                    <p>Amount -> 
                    {$db->categories()->getCategoryProductsNumber($category->getId())}</p>
                </article>";
        }
    ?>
</section>