<?php
require_once "model/product.php";
require_once "model/dimension.php";
require_once "template/common.php";
function smallProductCard($product,$dimensions,$type=null)
{
    $dim = getProductSize($product,$dimensions);
    $real_price = formatPrice($product->getPrice() /100);
    $actual_price = formatPrice(productPriceWithDiscount($product));
    if($product->getAmount() == 0){
        $type = Type::SOLD_OUT;
    }
    return '<article class="small_product'.($type==Type::SOLD_OUT ? " sold_out" : "") .'">
                <header>'
                .($type==null ? '' :('<h4 class="'.($type).'">'.($type == Type::DISCOUNT ? ($product->getDiscount()."% off") : str_replace("_"," ",$type)).'</h4>')).'
            <img alt="heart" src="img/mix/empty_heart.png"/> 
                </header>
            <main>
                <img alt="" onClick="location.href ='.("'product.php?id_product=".$product->getId()."'").'" src="'.$product->getImagePath().'"/>
            </main>
            <footer>
                <h3>'.$product->getName().'</h3>
                <div><div>'.
                '<h2 '.($real_price!==$actual_price ? 'class="actual_price"' : '').'>'.$actual_price.'
                </h2>'.($real_price!==$actual_price ? 
                ('<h2 class="real_price">'.$real_price.'</h2>'):'').'</div><div>'.displaySize($dim,$product->getId()).'             
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

    $var = '
    <article id="' . $product->getId() . '">
        <form enctype="multipart/form-data">
            <input type="hidden" name="id" value="' . $product->getId() . '"/>
            <div class="box">
                <div class="container">
                    <div class="center">
                        <img alt="" src="' . $product->getImagePath() . '">
                    </div>
                    <div>
                        <input type="text" name="name" id="name_' . $product->getId() . '" value="' . $product->getName() . '">
                        <div class="container">
                            <h3>€</h3>
                            <input type="number" id="price_' . $product->getId() . '" step="0.01" min="0" name="price" value="' . ($product->getPrice()/100) . '">
                        </div>
                        <div class="container">
                            <h3>Sconto %</h3>
                            <input type="number" id="discount_' . $product->getId() . '" min="0" max="100" name="discount" value="' . $product->getDiscount() . '">
                        </div>
                        <div class="container">
                            <h3>Quantità</h3>
                            <input type="number" min="0" id="amount_' . $product->getId() . '" step="1" name="amount" value="' . $product->getAmount() . '">
                        </div>
                    </div>
                </div>
                <div class="center">
                    <input type="file" id="loaded_image_' . $product->getId() . '" name="img">
                </div>
                <div class="center">
                        ';
    $var .= sizeSelector($dim, $product->getId());
    $var .= '
                </div>
                <div class="container">
                    <label for="category_' . $product->getId() . '">Categoria</label>
                    <select id="category_' . $product->getId() . '" name="category">';
    foreach ($categories as $category) {
        $var .= '<option ' . ($product->getCategory() == $category->getId() ? "selected" : "") . ' value="' . $category->getId() . '">' . $category->getName() . '</option>';
    }
    $var .= '
                </select>
                </div>
                <h3>Descrizione</h3>
                <div class="container">
                    <textarea id="description_' . $product->getId() . '" name="description" cols="80" rows="5">' . $product->getDescription() . '</textarea>
                </div>
                <div class="container">
                    <button type="submit "id="delete_' . $product->getId() . '">Elimina</button>
                    <button type="submit "id="save_' . $product->getId() . '">Salva</button>
                </div>
        </form>
    </article>';
    return $var;
}

function sellerPieceCard($product)
{
    $layers = 4;
    $var = '
    <article id="' . $product->getId() . '">
        <form enctype="multipart/form-data">
            <input type="hidden" name="id" value="' . $product->getId() . '"/>
            <div class="box">
                <div class="container">
                    <div class="center">
                        <img alt="" src="' . $product->getImagePath() . '">
                    </div>
                    <div>
                        <input type="text" name="name" id="name_' . $product->getId() . '" value="' . $product->getName() . '">
                        <div class="container">
                            <h3>€</h3>
                            <input type="number" id="price_' . $product->getId() . '" step="0.01" min="0" name="price" value="' . ($product->getPrice()/100) . '">
                        </div>
                    </div>
                </div>
                <div class="center">
                    <input type="file" id="loaded_image_' . $product->getId() . '" name="img">
                </div>
                <div class="container">
                    <label for="layer_' . $product->getId() . '">Strato</label>
                    <select id="layer_' . $product->getId() . '" name="layer">';
    for($i=1; $i <= $layers ; $i ++){
        $var .= '<option ' . ($product->getLayer() == $i ? "selected" : "") . ' value="' . $i . '">' . $i . '</option>';
    }
    $var .= '
                </select>
                </div>
                <div class="container">
                    <button type="submit "id="delete_' . $product->getId() . '">Elimina</button>
                    <button type="submit "id="save_' . $product->getId() . '">Salva</button>
                </div>
        </form>
    </article>';
    return $var;
}
