<!DOCTYPE html>  
    <html lang="it"> 
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
        <meta name="HandheldFriendly" content="true"/>
        <title><?php echo $templateParams["title"]?></title>
        <link rel="stylesheet" type="text/css" href="./css/reset.css?<?php echo time() ?>" />
        <link rel="stylesheet" type="text/css" href="./css/style.css?<?php echo time() ?>" />
        <?php 
            if(isset($templateParams["styles"])){
                if(is_array($templateParams["styles"])){
                    foreach($templateParams["styles"] as $style){                        
                        echo $style;    
                        echo "\r\n\t\t";                    ;
                    }
                } else {
                    echo $templateParams["styles"];
                    echo "\r\n";
                }
            }       
        ?>      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
       
        
        <?php 
            if(isset($templateParams["scripts"])){
                if(is_array($templateParams["scripts"])){
                    foreach($templateParams["scripts"] as $script){                        
                        echo $script;    
                        echo "\r\n\t\t";                    ;
                    }
                } else {
                    echo $templateParams["scripts"];
                    echo "\r\n";
                }
            }       
        ?>
        <script src="js/common.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>