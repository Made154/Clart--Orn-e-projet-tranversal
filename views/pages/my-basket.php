<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <title>Mon panier</title>
    <link rel="stylesheet" href="/Clart--Orn-e-projet-tranversal/assets/css/app.css">
</head>

<body>



<?php if (empty($basketItems)): ?>
    <h1 style="color:white; text-align:center;">Votre panier est vide.</h1>

<?php else: ?>
    <?php $grandTotal = 0; ?>

    <?php foreach ($basketItems as $item): ?>
        <?php
            $total = $item['price'] * $item['quantity'];
            $grandTotal += $total;
        ?>

        <div class="basket_item">
                <div class="bloc-image-panier">
                    <img 
                        src="<?= htmlspecialchars($item['illustration']) ?>" 
                        alt="<?= htmlspecialchars($item['name']) ?>">
                </div>

                <div class="bloc-texte">
                    <h2><?= htmlspecialchars($item['name']) ?></h2>

                    <p><strong>Prix unitaire :</strong> <?= number_format($item['price'], 2) ?> €</p>
                    <p><strong>Quantité :</strong> <?= (int)$item['quantity'] ?></p>
                    <p><strong>Total :</strong> <?= number_format($total, 2) ?> €</p>
                    
                    <form action="models/remove_from_basket.php" method="POST" class="remove-from-basket">
                        <input type="hidden" name="basket_item_id" value="<?= (int)$item['basket_item_id'] ?>">

                        <input type="hidden" name="article_id" value="<?= (int)$item['article_id'] ?>">

                        <input type="number" name="quantity" value="1" min="1" max="<?= $item['quantity'] ?>">

                        <button type="submit" class="Lien">Supprimer</button>
                    </form>


                        <a class="Lien" href="index.php?page=product&id=<?= (int)$item['article_id'] ?>">
                            Voir l’article
                        </a>
                </div>
        </div>

    <?php endforeach; ?>
<div class="square"> 
    <form action="index.php?page=checkout" method="POST" style="text-align:center; margin-top:10px;">

        <input type="hidden" name="grand_total" value="<?= $grandTotal ?>">

        <input type="hidden" name="is_logged_in" value="<?= isset($_SESSION['user_id']) ? 1 : 0 ?>">

        <button type="submit" class="Lien" style="color: white; margin-top:10px;">Passer à la caisse</button>
    </form>

    <h2 style="color:white; text-align:center; margin-top:10px;">
        Total du panier : <?= number_format($grandTotal, 2) ?> €
    </h2>
</div>


<?php endif; ?>

</body>
</html>

