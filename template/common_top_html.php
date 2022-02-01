<!DOCTYPE html>  
    <html lang="it"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php $templateParams["title"]?></title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <?php 
            if(isset($templateParams["scripts"])){
                if(is_array($templateParams["scripts"])){
                    foreach($templateParams["scripts"] as $script){
                        echo $script;
                    }
                } else {
                    echo $templateParams["scripts"];
                }
            }       
        ?>
    </head>
    <body>



