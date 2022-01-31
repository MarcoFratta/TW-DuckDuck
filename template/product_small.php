<?php
require_once "model/product.php";
require_once "model/dimension.php";
function smallProductCard($product)
{
    return '<article> 
                <a href="product.php?id_product=' . $product->getId() . '">' . $product->getName() . '</a>          
            </article>';
}


function sellerProductCard($product, $categories, $dimensions)
{
    $dim = 3;
    foreach ($dimensions as $dimension) {
        if ($product->getDimension() == $dimension->getId()) {
            $dim = $dimension->getSize();
            break;
        }
    }

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
