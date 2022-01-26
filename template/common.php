<?php

$max_size = 5;

function sizeSelector($size)
{
    global $max_size;
    $val =  '<section id="size_selector">
                    <input type="hidden" name="dimension" id="dimension" value="' . $size . '"/>
                    <button type="button" id="decrease">-</button>';
    for ($i = 1; $i <= $max_size; $i++) {
        $val .= '<img alt="" src="img/dimension-duck.png" id="img' . $i . '"/>';
    }
    $val .= '    <button type="button" id="increase">+</button>
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
