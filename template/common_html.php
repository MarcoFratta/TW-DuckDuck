<?php
    function withBody($bodyfunction, $templateParams){
    echo '<!DOCTYPE html>
    <html lang="it"> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>'. $templateParams["title"].'</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
    </head>
    <body>'.$bodyfunction().'</body>
    </html>';
}
?>


