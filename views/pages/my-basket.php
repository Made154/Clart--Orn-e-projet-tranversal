<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_basket'])) {
    $basketItems = [];
} else {
    $stmt = $db->prepare("
        SELECT
            bi.id AS basket_item_id,
            bi.quantity,
            a.id AS article_id,
            a.name,
            a.price,
            a.illustration
        FROM basket_items bi
        JOIN article a ON bi.id_article = a.id
        WHERE bi.id_basket = :id_basket
    ");
    $stmt->execute([':id_basket' => $_SESSION['id_basket']]);
    $basketItems = $stmt->fetchAll();
}
?>

<section class="basket-page">
    <h1 class="basket-page__title">Mon panier</h1>

    <?php if (empty($basketItems)): ?>

    <div class="basket-empty">
        <p class="basket-empty__icon">🛒</p>
        <p class="basket-empty__text">Votre panier est vide.</p>
        <a href="index.php?page=shop" class="basket-empty__btn">Découvrir la boutique</a>
    </div>

    <?php else: ?>

    <div class="basket-layout">
        <ul class="basket-list">
            <?php $grandTotal = 0; ?>
            <?php foreach ($basketItems as $item): ?>
            <?php
                $total = $item['price'] * $item['quantity'];
                $grandTotal += $total;
            ?>
            <li class="basket-item">
                <img
                    class="basket-item__img"
                    src="<?= htmlspecialchars($item['illustration']) ?>"
                    alt="<?= htmlspecialchars($item['name']) ?>"
                >
                <div class="basket-item__body">
                    <h2 class="basket-item__name"><?= htmlspecialchars($item['name']) ?></h2>
                    <p class="basket-item__price"><?= number_format($item['price'], 2) ?> € / unité</p>
                    <p class="basket-item__qty">Quantité : <strong><?= (int)$item['quantity'] ?></strong></p>
                    <p class="basket-item__total">Sous-total : <strong><?= number_format($total, 2) ?> €</strong></p>
                </div>
                <div class="basket-item__actions">
                    <a class="basket-item__view" href="index.php?page=product&id=<?= (int)$item['article_id'] ?>">Voir le produit</a>
                    <form action="models/remove_from_basket.php" method="POST">
                        <input type="hidden" name="basket_item_id" value="<?= (int)$item['basket_item_id'] ?>">
                        <input type="hidden" name="article_id" value="<?= (int)$item['article_id'] ?>">
                        <div class="basket-item__remove-row">
                            <input type="number" name="quantity" value="1" min="1" max="<?= (int)$item['quantity'] ?>">
                            <button type="submit" class="basket-item__remove-btn">Supprimer</button>
                        </div>
                    </form>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>

        <div class="basket-summary">
            <h2 class="basket-summary__title">Récapitulatif</h2>
            <div class="basket-summary__row">
                <span>Articles</span>
                <span><?= count($basketItems) ?> produit<?= count($basketItems) > 1 ? 's' : '' ?></span>
            </div>
            <div class="basket-summary__row basket-summary__row--total">
                <span>Total</span>
                <span><?= number_format($grandTotal, 2) ?> €</span>
            </div>
            <form action="index.php?page=checkout" method="POST">
                <input type="hidden" name="grand_total" value="<?= $grandTotal ?>">
                <input type="hidden" name="is_logged_in" value="<?= isset($_SESSION['user_id']) ? 1 : 0 ?>">
                <button type="submit" class="basket-summary__checkout-btn">
                    Passer à la caisse
                </button>
            </form>
            <a href="index.php?page=shop" class="basket-summary__continue">Continuer mes achats</a>
        </div>
    </div>

    <?php endif; ?>
</section>
