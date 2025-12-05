<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clarté Ornée</title>
    <link rel="stylesheet" href="assests/css/app.css">
</head>
<body>
    
    <?php include('views/partials/_navbar.php') ?>
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