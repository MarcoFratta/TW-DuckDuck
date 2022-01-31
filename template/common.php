<?php

$max_size = 5;
// need size_selector.js to work.
function sizeSelector($size, $id = null)
{
    global $max_size;
    $val =  '<section id="size_selector'.($id !== null ? ("_".$id) : "").'">
        <input type="hidden" name="dimension" id="dimension'.($id !== null ? ("_".$id) : "").'" value="' . $size . '"/>
        <button type="button" id="decrease'.($id !== null ? ("_".$id) : "").'">-</button>';
    $val .= "\r\n";
    for ($i = 1; $i <= $max_size; $i++) {
         $val .= "\t\t";
        $val .= '<img alt="" src="img/dimension-duck.png" id="'.($id !== null ? ($id."_") : "").'selector_img' . $i . '"/>';
        $val .= "\r\n";
    }
    $val .= "\t\t". '<button type="button" id="increase'.($id !== null ? ("_".$id) : "").'">+</button>
    </section>';
    return $val;
}

function shippingInfo()
{
    return '<div>
            <img> <!-- icona del calendario -->
            <p>Consegna entro 7 giorni lavorativi</p>
            <img> <!-- icona del furgone -->
            <p>Spedizione gratuita</p>
            <img> <!-- icona dello scudo -->
            <p>24 mesi di garanzia</p>
            <img> <!-- icona del box -->
            <p>Reso gratuito entro 60 giorni</p>
            <img> <!-- icona dell ambiente -->
            <p>Plastica 100% riciclata</p>
        </div>';
}
