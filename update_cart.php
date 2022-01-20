<?php
    session_start();
    if (isset($_GET['action'],$_POST['type'],$_POST['product_id'])){
        $product_id = (int)$_POST['product_id'];
        $type = $_POST['type'];
        $action = $_GET['action'];
        if(isset($_SESSION['cart_'.$type])){
            if($action == "add"){
                $_SESSION['cart_'.$type][$product_id] += 1;
            } elseif($action == "sub"){
                if($_SESSION['cart_'.$type][$product_id]>1){
                    $_SESSION['cart_'.$type][$product_id] -= 1;
                } else {
                    unset($_SESSION['cart_'.$type][$product_id]);
                    if(sizeof($_SESSION['cart_'.$type]) == 0){
                        unset($_SESSION['cart_'.$type]);
                    }
                }               
            }
        }
    }
    header('location:cart.php');
?>