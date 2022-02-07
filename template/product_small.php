<?php
require_once "model/product.php";
require_once "model/dimension.php";
require_once "template/common.php";
function smallProductCard($product,$dimensions,$type=null)
{
    $dim = getProductSize($product,$dimensions);
    $real_price = $product->getPrice() /100;
    $actual_price = productPriceWithDiscount($product);
    return '<article>
                <header>'
                .($type==null ? '' :('<h4 class="'.($type == Type::DISCOUNT ? "sconto" : $type).'">'.$type.'</h4>')).
            '<img alt="heart" src="../img/mix/empty_heart.png"> 
                </header>
            <main>
                <img alt="" src="'.$product->getImagePath().'">
            </main>
            <footer>
                <h3>'.$product->getName().'</h3>
                <div><div>'.($real_price!==$actual_price ? 
                ('<h2 class="real_price">'.$real_price.'</h2>'):'').
                '<h2 '.($real_price!==$actual_price ? 'class="actual_price"' : '').'>'.$actual_price.'
                </h2></div><div>'.displaySize($dim,$product->getId()).'             
                <form action="add_cart.php" method="POST">
                    <input type="hidden" name="type" value="normal"/>
                    <input type="hidden" name="product_id" value="'.$product->getId().'"/>
                    <button type="submit">+</button>
                </form>
                </div>
                </div>
                           
            </footer>
        </article>';
}




function sellerProductCard($product, $categories, $dimensions)
{
    $dim = getProductSize($product,$dimensions);

    $var =  '<article id="' . $product->getId() . '">
    <form enctype="multipart/form-data">
    <input type="hidden" name="id" value="' . $product->getId() . '"/>
    <h3>Nome</h3>
    <input type="text" name="name" id="name_' . $product->getId() . '" value="' . $product->getName() . '">
    
    <h3>Immagine</h3>
    <img alt="" src="' . $product->getImagePath() . '">
    <input type="file" id="loaded_image_' . $product->getId() . '" name="img">

    <label for="dimension_' . $product->getId() . '" >Dimensione</label>
    ';
    $var .= sizeSelector($dim, $product->getId());

    $var .= '
    <h3>Prezzo</h3>
    <input type="number" id="price_' . $product->getId() . '" step="0.01" min="0" name="price" value="' . ($product->getPrice()/100) . '">

    <h3>Descrizione</h3>
    <input type="text" id="description_' . $product->getId() . '" name="description" value="' . $product->getDescription() . '">

    <h3>Sconto</h3>
    <input type="number" id="discount_' . $product->getId() . '" min="0" max="100" name="discount" value="' . $product->getDiscount() . '">

    <label for="amount_' . $product->getId() . '">Unità disponibili</label>
    <input type="number" min="0" id="amount_' . $product->getId() . '" name="amount" value="' . $product->getAmount() . '">

    <label for="category_' . $product->getId() . '">Categoria</label>
        <select id="category_' . $product->getId() . '" name="category">';
    foreach ($categories as $category) {
        $var .= '<option ' . ($product->getCategory() == $category->getId() ? "selected" : "") . ' value="' . $category->getId() . '">' . $category->getName() . '</option>';
    }
    $var .= '</select>
    <button type="submit "id="save_' . $product->getId() . '">Modifica</button>
    </form>
    </article>';
    return $var;
}
