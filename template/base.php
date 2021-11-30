<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
    <header>
        <h1>Duck Duck Store</h1>
    </header>
    <nav>
        <ul>
            <li><a <?php isActive("index.php");?> href="index.php">Home</a></li>
            <li><a <?php isActive("categorie.php");?> href="categorie.php">Categorie</a></li>
            <li><a <?php isActive("account.php");?> href="account.php">Account</a></li>
            <li><a <?php isActive("crea.php");?> href="crea.php">Crea</a></li>
        </ul>
    </nav>
    <main>
        
    </main>
</body>
</html>