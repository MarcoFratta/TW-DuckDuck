<?php

  require_once "db/connections.php";
  require_once "db/database.php";
  require_once "utils/functions.php";
  require_once "bootstrap.php";


  $templateParams['title'] = "Categories";

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["title"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>

<body>
    <?php
    require "template/header.php";
    $db = DbConnections::mySqlConnection();
    require "template/vertical_categories.php";
    ?>
</body>

</html>