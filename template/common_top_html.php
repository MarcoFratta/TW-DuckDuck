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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">       
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
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
        
        
    
    </head>
    <body>