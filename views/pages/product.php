<?php require('models/product.php'); ?>

<link rel="stylesheet" href="assests/css/app.css">

<body>
<section>
    <h1><?php echo $article['name']; ?></h1>


    <div class="product_description">
        <img src='<?php echo $article['illustration']; ?>' alt="">
        <div class="description">
            <h3>Description</h3>
            <p><?php echo $article['description']; ?></p>
        <p class="prix">Prix : <?php echo $article['price']; ?> € </p>
            <?php if ($article['is_new']): ?>
                <h3 class="badge new">Nouveau</h3>
            <?php endif; ?>

            <?php if ($article['is_promo']): ?>
                <h3 class="badge promo">Promo</h3>
            <?php endif; ?>
        </div>
    </div>

    <form action="models/add_to_basket.php" method="POST">
        <input type="hidden" name="article_id" value="<?php echo $article ['id']; ?>">
        <input type="number" name="quantity" value="1" min="1" max="100">
        <button type="submit">🛒 Ajouter au Panier</button>

    </form>
</section>

<button><a href="index.php?page=update&id=<?php echo $article['id']; ?>" class="btn">Modifier</a></button>

