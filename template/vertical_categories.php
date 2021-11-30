<section>
    <?php
        require_once "model/category.php";
        require_once "db/database.php";
        $categories = $db->categories()->getCategories();
        foreach($categories as $category){
            echo "<article>
                    <h1> {$category->getName()}</h1>
                    <p>Amount -> 
                    {$db->categories()->getCategoryProductsNumber($category->getId())}</p>
                </article>";
        }
    ?>
</section>