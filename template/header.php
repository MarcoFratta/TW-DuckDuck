    <header id="header">
            <div>
                <span  id="menu_icon" onclick="changeNav()" data-feather="menu"></span>
                <img onClick="location.href='index.php'" alt="Site Logo" src="./img/mix/svg/logo.svg"/>
                <div>
                <?php
                    if(isset($_SESSION['cart_normal']) || isset($_SESSION['cart_custom'])){
                        echo ' <img alt="" src="./img/mix/svg/cart_tick.svg"/>';
                    } ?>
                  <span onClick="location.href='cart.php'" data-feather="shopping-cart"></span>
                </div>
               
            </div>
            <?php
                if(isset($templateParams['header_title'])){
                    echo 
                    '<div>
                        <span id="arrow-left" data-feather="arrow-left" onClick="history.back()"></span>
                        <h2>'.$templateParams['header_title'].'</h2>
                        <button type="button" id="filters" onClick="toggleFilters()"><img src="./img/mix/svg/filters.svg" alt="logo"/></button>
                    </div>';
                }
            ?>  
    </header>
    <nav id="sideNav" class="sidenav">
            <a <?php isActive("index.php");?> href="index.php">Home</a>
            <a <?php isActive("account.php");?> href="details.php">Account</a>
            <a <?php isActive("categorie.php");?> href="categories.php">Categorie</a>   
            <a href="category.php?new_products=1">Nuovi arrivi</a>
            <a href="category.php?discounted=1">Saldi</a>    
            <div>
                <a <?php isActive("crea.php");?> href="new_product.php?type=custom">Crea</a>
                <h4>nuovo</h4>
            </div>
            
    </nav>
    <main id="main">


