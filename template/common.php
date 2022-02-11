<?php

$max_size = 5;

function displaySize($size, $id = null)
{
    global $max_size;
    $val =  '<section id="size_selector' . ($id !== null ? ("_" . $id) : "") . '">
        <input type="hidden" name="dimension" id="dimension' . ($id !== null ? ("_" . $id) : "") . '" value="' . $size . '"/>';
    $val .= "\r\n";
    for ($i = 1; $i <= $max_size; $i++) {
        $val .= "\t\t";
        $val .= '<img alt="" src="/../img/mix/svg/dimension-duck.svg" id="' . ($id !== null ? ($id . "_") : "") . 'selector_img' . $i . '"/>';
        $val .= "\r\n";
    }
    $val .= '</section>';
    return $val;
}
// need size_selector.js to work.
function sizeSelector($size, $id = null)
{
    global $max_size;
    $val =  '<section id="size_selector' . ($id !== null ? ("_" . $id) : "") . '">
        <input type="hidden" name="dimension" id="dimension' . ($id !== null ? ("_" . $id) : "") . '" value="' . $size . '"/>
        <div>
        <button type="button" id="decrease' . ($id !== null ? ("_" . $id) : "") . '">-</button>
        ';
    $val .= "\r\n";
    for ($i = 1; $i <= $max_size; $i++) {
        $val .= "\t\t";
        $val .= '<img alt="" src="/../img/mix/svg/dimension-duck.svg" id="' . ($id !== null ? ($id . "_") : "") . 'selector_img' . $i . '"/>';
        $val .= "\r\n";
    }
    $val .= "\t\t" . '
    <button type="button" id="increase' . ($id !== null ? ("_" . $id) : "") . '">+</button>
    </div>
    </section>';
    return $val;
}

function shippingInfo()
{
    return '<section id="shipment_info">
    <div> 
        <i class="shipping_icon" data-feather="calendar"></i>
        <p>Consegna entro 7 giorni lavorativi</p>
    </div>
    <div> 
        <i class="shipping_icon" data-feather="truck"></i>
        <p>Spedizione gratuita</p>
    </div>
    <div> 
        <i class="shipping_icon" data-feather="shield"></i>
        <p>24 mesi di garanzia</p>
    </div>
    <div> 
        <i class="shipping_icon" data-feather="package"></i>
        <p>Reso gratuito entro 60 giorni</p>
    </div>
    <div>          
        <i class="shipping_icon" data-feather="droplet"></i>
        <p>Plastica 100% riciclata</p>
    </div>
    </section>';
}
function displayError($message){
    return '<div class="error_page">
                <section>
                    <p>'.$message.'</p>
                </section>               
            </div>';
}

