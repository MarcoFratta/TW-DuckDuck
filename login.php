<?php
        require_once "template/common_html.php";
        require_once "utils/functions.php";

        if(!isset($_GET['type'])){
            die("error");
        }

        $templateParams['title'] = "Accesso ". $_GET['type'] == "client" ? "client" : "venditore";
        echo withBody(function (){
            require "template/header.php";
            echo '<img>
            <h3>Bentornato su Duck Duck</h3>
            <h5>Accedi per continuare</h5>
            <form method="POST" action="auth.php?type='.$_GET['type'].'">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <button type="submit">Accedi</button>
            </form>
            <h3>OPPURE</h3>
            <a>Password dimenticata?</a>
            <h6>Non hai un account?</h6><a>Registrati</a>
            <h6>Sei un fornitore?</h6><a>Area privata</a>';
            #footer
    }, $templateParams);
        
?>
