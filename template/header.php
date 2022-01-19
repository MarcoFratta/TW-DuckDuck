    <header>
        <h1>Duck Duck Store</h1>
    </header>
    <nav>
        <ul>
            <li><a <?php isActive("index.php");?> href="index.php">Home</a></li>
            <li><a <?php isActive("categorie.php");?> href="categories.php">Categorie</a></li>
            <li><a <?php isActive("account.php");?> href="account.php">Account</a></li>
            <li><a <?php isActive("crea.php");?> href="crea.php">Crea</a></li>
            <li><a <?php isActive("cart.php");?> href="cart.php">Carrello</a></li>
            <li><a <?php isActive("login.php");?> href="login.php?type=seller">Accesso venditore</a></li>
            <li><a <?php isActive("login.php");?> href="login.php?type=client">Accesso cliente</a></li>
            <li><a <?php isActive("register.php");?> href="register.html">Registrati</a></li>
            <li><a <?php isActive("details.php");?> href="details.php">Dettagli</a></li>
         </ul>
    </nav>