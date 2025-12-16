<?php require('models/product.php'); ?>

<link rel="stylesheet" href="assests/css/app.css">

<body>
    <h1><?php echo $article['name']; ?></h1>


    <div class="product_description">
        <img src='<?php echo $article['illustration']; ?>' alt="">
        <h3>Description</h3>
        <p><?php echo $article['description']; ?></p>
        <p class="prix">Prix : <?php echo $article['price']; ?> € </p>
    </div>

    <form action="ajouter_au_panier.php" method="POST">
        <input type="hidden" name="article_id" value="<?php echo $article ['id']; ?>">
        <input type="number" name="quantity" value="1" min="1" max="100">
        <button type="submit" class="btn">🛒 Ajouter au Panier</button>
    </form>

    <button><a href="index.php?page=update&id=<?php echo $article['id']; ?>" class="btn">Modifier</a></button>
</body>


<form action="../../models/add_to_basket.php" method="POST">
    <input type="hidden" name="article_id" value="<?php echo $article ['id']; ?>">
    <input type="number" name="quantity" value="1" min="1" max="100">
    <button type="submit">🛒 Ajouter au Panier</button>

</form>

<a href="../../index.php?page=update&id=<?php echo $article['id']; ?>">Modifier</a>

