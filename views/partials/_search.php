<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    @$keywords=$_GET["keywords"];
    @$valider=$_GET["valider"];
    if(isset($valider) && trim($keywords) !== '') {
        $words=preg_split('/\s+/',trim($keywords));
        $words=array_filter($words, fn($w) => $w !== '');

        $conditions = [];
        $params = [];

        foreach ($words as $word) {
            $conditions[]="(a.name LIKE ? OR c.name LIKE ? OR a.description LIKE ?)";
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
                    a.description
                FROM article a
                JOIN category c ON a.id_category = c.id
                WHERE " . implode(" OR ", $conditions);
        $res=$db->prepare($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute($params);
        $tab=$res->fetchAll();
        $afficher="oui";
    }
}
?>

<form method="get" action="">
    <input type="hidden" name="page" value="<?php echo $_GET['page'] ?? 'home'; ?>"/>
    <input type="text" name="keywords" value="<?php echo $keywords?>" placeholder="Mots-clés" />
    <input type="submit" name="valider" value="Rechercher" />
</form>

<?php if (@$afficher=="oui") { ?>
<ul class="result-list">
<?php for ($i = 0; $i < count($tab); $i++): ?>
    <li class="result-item">
        <div>
            <strong><h3><?php echo htmlspecialchars($tab[$i]['name_article']); ?></h3></strong><br>
            <a href="index.php?page=product&id=<?php echo $tab[$i]['article_id']; ?>">
                <img 
                    src="<?php echo htmlspecialchars($tab[$i]['illustration']); ?>" 
                    alt="<?php echo htmlspecialchars($tab[$i]['name_article']); ?>" 
                >
            </a>
        </div>

        <div class="result-content">
            <em><?php echo htmlspecialchars($tab[$i]['category']); ?></em>
            <br>
            <br>
            <?php echo htmlspecialchars($tab[$i]['description']); ?>
        </div>

    </li>
<?php endfor; ?>
</ul>
<?php } ?>