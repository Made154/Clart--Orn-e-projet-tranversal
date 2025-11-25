<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clarté Ornée</title>
    <link rel="stylesheet" href="assests/css/style.css">
</head>
<body>
    <?php include('views/partials/_navbar.php') ?>
    <main class="container">
         <?php include ('views/pages/'. $_GET['page'] .'.php') ?>
    </main>
    <?php include('views/partials/_footer.php') ?>
</body>
</html>