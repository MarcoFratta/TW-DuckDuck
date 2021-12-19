<?php

        $db = new mysqli("localhost", "root", "", "giugno");
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        if(!isValid($_GET['A']) || !isValid($_GET['B'])){
            die("input error");
        }

        $a_num = [];
        $b_num = [];
        $query = "SELECT * 
                FROM insiemi 
                WHERE insieme = ?";
        
        $stmt = $db->prepare($query);
        $stmt->bind_param('i',$_GET['A']);
        $stmt->execute();
        $result = $stmt->get_result();
        foreach($result as $value){
            array_push($a_num , $value['valore']);
        }
        $stmt->close();

        $query = "SELECT * 
                FROM insiemi 
                WHERE insieme = ?";
        
        $stmt = $db->prepare($query);
        $stmt->bind_param('i',$_GET['B']);
        $stmt->execute();
        $result = $stmt->get_result();
        foreach($result as $value){
            array_push($b_num , $value['valore']);
        }
        $stmt->close();

        $query = "SELECT max(insieme) as max_value FROM insiemi";      
        $stmt = $db->prepare($query);
        $stmt->execute();
        $max_id = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]['max_value'];
        $next_id = $max_id + 1;
        $stmt->close();



        if ($_GET['O'] == "u"){
            $new_num = array_merge($a_num, $b_num);
        }
        else {
            $new_num = array_intersect($a_num,$b_num);
        }

        var_dump($_GET['O']);
        echo "A";
        var_dump($a_num);
        echo "B";
        var_dump($b_num);
        echo "N";
        var_dump($new_num);
        echo "next id -> $next_id ";



        foreach ($new_num as $val){
        $query = 'INSERT INTO insiemi (valore, insieme) VALUES (?,?)';
        $stmt = $db->prepare($query);
        var_dump($val);
        $stmt->bind_param('ii',$val, $next_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        }

        function isValid($x){
            return isset($x) && $x > 0 ;      
        }
?>