<?php
        require_once "utils/functions.php";
        

        if(!isset($_GET['type'])){
            die("error");
        }
        $templateParams['title'] = "Accesso ". $_GET['type'] == "client" ? "client" : "venditore";
        $templateParams['styles'] = ['<link rel="stylesheet" type="text/css" href="./css/login.css?'.time().'" />'];
        $templateParams['scripts'] = [];
        require "template/common_top_html.php";
        require "template/header.php";
        $out = '<section><div><img alt="logo"  src="img/mix/svg/login_logo.svg">
            <h3>Bentornato su Duck Duck</h3>
            <h5>Accedi per continuare</h5></div>
            <form method="POST" action="auth.php?type='.$_GET['type'].'">
                <div>
                    <i data-feather="mail"></i>
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div>
                    <i data-feather="lock"></i>
                    <input type="password" placeholder="Password" name="password">
                </div>             
                <button type="submit">Accedi</button>
            </form>
            <div>
                <svg width="126" height="1" viewBox="0 0 126 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="0.5" x2="126" y2="0.5" stroke="#EBF0FF"/>
                </svg>
                <h3>OPPURE</h3>
                <svg width="126" height="1" viewBox="0 0 126 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="0.5" x2="126" y2="0.5" stroke="#EBF0FF"/>
                </svg>
            </div>   
            <div>
                <div>
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.8445 6.93323H15.2001V6.90003H8.00003V10.1H12.5213C11.8617 11.9628 10.0892 13.3001 8.00003 13.3001C5.34922 13.3001 3.20001 11.1508 3.20001 8.50003C3.20001 5.84922 5.34922 3.70001 8.00003 3.70001C9.22364 3.70001 10.3368 4.16162 11.1844 4.91562L13.4473 2.65281C12.0185 1.3212 10.1072 0.5 8.00003 0.5C3.58202 0.5 0 4.08202 0 8.50003C0 12.9181 3.58202 16.5001 8.00003 16.5001C12.4181 16.5001 16.0001 12.9181 16.0001 8.50003C16.0001 7.96363 15.9449 7.44003 15.8445 6.93323Z" fill="#FFC107"/>
                <path d="M0.921875 4.77642L3.55029 6.70403C4.26149 4.94322 5.9839 3.70001 7.99951 3.70001C9.22311 3.70001 10.3363 4.16162 11.1839 4.91562L13.4467 2.65281C12.0179 1.3212 10.1067 0.5 7.99951 0.5C4.92669 0.5 2.26188 2.23481 0.921875 4.77642Z" fill="#FF3D00"/>
                <path d="M8.00014 16.5003C10.0666 16.5003 11.9442 15.7095 13.3638 14.4235L10.8878 12.3283C10.0846 12.9367 9.08615 13.3003 8.00014 13.3003C5.91933 13.3003 4.15253 11.9735 3.48692 10.1219L0.878113 12.1319C2.20212 14.7227 4.89093 16.5003 8.00014 16.5003Z" fill="#4CAF50"/>
                <path d="M15.8444 6.93322H15.2V6.90002H8V10.1H12.5212C12.2044 10.9948 11.6288 11.7664 10.8864 12.3284C10.8868 12.328 10.8872 12.328 10.8876 12.3276L13.3636 14.4229C13.1884 14.5821 16 12.5 16 8.50003C16 7.96363 15.9448 7.44003 15.8444 6.93322Z" fill="#1976D2"/>
                </svg>
                <h3>Accedi con Google</h3>
                </div>
                <div>
                <svg width="11" height="21" viewBox="0 0 11 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 0.5H8C6.67392 0.5 5.40215 1.02678 4.46447 1.96447C3.52678 2.90215 3 4.17392 3 5.5V8.5H0V12.5H3V20.5H7V12.5H10L11 8.5H7V5.5C7 5.23478 7.10536 4.98043 7.29289 4.79289C7.48043 4.60536 7.73478 4.5 8 4.5H11V0.5Z" fill="#4092FF"/>
                </svg>
                <h3>Accedi con Facebook</h3>
                </div>
            </div>
            <div>
                <a>Password dimenticata?</a>
                <div>
                    <h6>Non hai un account?</h6>
                    <a href="register.php">Registrati</a>
                </div>';
            if($_GET['type'] == "client")
                $out .= '<div>
                            <h6>Sei un fornitore?</h6>
                            <a href="login.php?type=seller">Area privata</a>
                        </div>';
            $out.= " </div>
            </section>";
            echo $out;
        require "template/footer.php";
        require "template/common_bottom_html.php";
