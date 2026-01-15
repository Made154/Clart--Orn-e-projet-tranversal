<?php
        $page = $_GET['page'] ?? 'home';
        $file = "assests/css/$page.css";

        if (file_exists($file)) {
            include($file);
        } else {
            echo "<p>Page introuvable : <strong>$page</strong></p>";
        }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clarté Ornée</title>
    <link rel="stylesheet" href="assests/css/app.css">
    <link rel="stylesheet" href="<?=$file?>">

</head>
<body style="
    background-image: url(https://ecoquartiervauban.fr/wp-content/uploads/2024/12/temp-imagejpg-4.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    background-attachment: fixed;
">

    <?php include('views/partials/_navbar.php') ?>
    <?php include ("models/bdd.php"); ?>
    
    <main class="container">
    <?php
        $page = $_GET['page'] ?? 'home';
        $file = "views/pages/$page.php";

        if (file_exists($file)) {
            include($file);
        } else {
            echo "<p>Page introuvable : <strong>$page</strong></p>";
        }
    ?>
    </main>
    <?php include('views/partials/_footer.php') ?>
</body>
</html>