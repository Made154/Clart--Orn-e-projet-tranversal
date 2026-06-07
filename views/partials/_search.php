<?php
    $keywords = $_GET['keywords'] ?? '';
    $valider  = $_GET['valider']  ?? '';

    if ($valider !== '' && trim($keywords) !== '') {
        $words = preg_split('/\s+/', trim($keywords));
        $words = array_filter($words, fn($w) => $w !== '');

        $conditions = [];
        $params = [];

        foreach ($words as $word) {
            $conditions[] = "(a.name LIKE ? OR c.name LIKE ? OR a.description LIKE ?)";
            $like = '%' . $word . '%';
            $params[] = $like;
            $params[] = $like;
            $params[] = $like;
        }

        if (!empty($conditions)) {
            $sql = "SELECT
                        a.id AS article_id,
                        a.name AS name_article,
                        c.name AS category,
                        a.illustration,
                        a.description,
                        a.price
                    FROM article a
                    JOIN category c ON a.id_category = c.id
                    WHERE " . implode(" OR ", $conditions);
            $res = $db->prepare($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute($params);
            $tab = $res->fetchAll();
            $afficher = true;
        }
    }
?>

<link rel="stylesheet" href="assests/css/_search.css">

<form class="search-form" method="get" action="">
    <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'] ?? 'home'); ?>"/>
    <input type="text" name="keywords" value="<?php echo htmlspecialchars($keywords); ?>" placeholder="Rechercher un produit..." autocomplete="off"/>
    <button type="submit" name="valider" value="1">
        <img src="assests/img/icone-shop.png" alt="Rechercher">
        Rechercher
    </button>
</form>

<?php if (!empty($afficher)): ?>
<div class="search-results">
    <?php if (empty($tab)): ?>
        <p class="search-no-results">Aucun résultat pour « <?php echo htmlspecialchars($keywords); ?> »</p>
    <?php else: ?>
        <p class="search-count"><?php echo count($tab); ?> résultat<?php echo count($tab) > 1 ? 's' : ''; ?> trouvé<?php echo count($tab) > 1 ? 's' : ''; ?></p>
        <ul class="search-list">
            <?php foreach ($tab as $item): ?>
            <li class="search-item">
                <a href="index.php?page=product&id=<?php echo $item['article_id']; ?>" class="search-item__link">
                    <img
                        class="search-item__img"
                        src="<?php echo htmlspecialchars($item['illustration']); ?>"
                        alt="<?php echo htmlspecialchars($item['name_article']); ?>"
                    >
                    <div class="search-item__body">
                        <span class="search-item__category"><?php echo htmlspecialchars($item['category']); ?></span>
                        <h3 class="search-item__title"><?php echo htmlspecialchars($item['name_article']); ?></h3>
                        <p class="search-item__desc"><?php echo htmlspecialchars($item['description']); ?></p>
                    </div>
                    <?php if (!empty($item['price'])): ?>
                    <span class="search-item__price"><?php echo htmlspecialchars($item['price']); ?> €</span>
                    <?php endif; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<?php endif; ?>
