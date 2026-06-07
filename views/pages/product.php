<?php
require('models/product.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<section class="product-page">
    <div class="product-detail">

        <div class="product-detail__gallery">
            <img
                class="product-detail__img"
                src="<?php echo htmlspecialchars($article['illustration']); ?>"
                alt="<?php echo htmlspecialchars($article['name']); ?>"
            >
        </div>

        <div class="product-detail__info">

            <?php if ($article['is_new'] || $article['is_promo']): ?>
            <div class="product-detail__badges">
                <?php if ($article['is_new']): ?>
                    <span class="badge badge--new">Nouveau</span>
                <?php endif; ?>
                <?php if ($article['is_promo']): ?>
                    <span class="badge badge--promo">Promo</span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <h1 class="product-detail__title"><?php echo htmlspecialchars($article['name']); ?></h1>
            <p class="product-detail__price"><?php echo htmlspecialchars($article['price']); ?> €</p>

            <div class="product-detail__separator"></div>

            <p class="product-detail__desc-label">Description</p>
            <p class="product-detail__desc"><?php echo htmlspecialchars($article['description']); ?></p>

            <form class="product-detail__form" action="models/add_to_basket.php" method="POST">
                <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
                <div class="product-detail__qty-wrapper">
                    <label for="quantity">Quantité</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="100">
                </div>
                <button type="submit" class="product-detail__add-btn">
                    <img src="assests/img/icone-cadi.png" alt="">
                    Ajouter au panier
                </button>
            </form>

            <?php if (($_SESSION['user_role'] ?? null) === 1): ?>
            <a href="index.php?page=update&id=<?php echo $article['id']; ?>" class="product-detail__edit-btn">Modifier le produit</a>
            <?php endif; ?>

        </div>
    </div>
</section>
