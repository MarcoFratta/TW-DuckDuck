<?php
require_once "../db/connections.php";
require_once "../db/database.php";
require_once "../utils/functions.php";

    if(isset($_GET['layer'])){
        $layer = $_GET['layer'];
        $db = DbConnections::mySqlConnection();
        $res = [];
        $items = $db->products()->getCustomItemByLayer($layer);
        if(!$items){
            echo 404;
        }
        foreach($items as $item){
            array_push($res,$item);
        }
        $res = (utf8ize($res));
        die(json_encode($res));
        }  
    elseif(isset($_GET['dim'])){
            $db = DbConnections::mySqlConnection();
            $res = [];
            $items = $db->products()->getDimensions();
            if(!$items){
                die(404);
            } 
            foreach($items as $item){
                array_push($res,$item);
            }        
            die(json_encode(utf8ize($res)));
        } else {
        echo 404;
    }

