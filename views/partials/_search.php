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
        $sql = "SELECT a.name AS name_article, c.name AS category, a.description
                FROM article a
                JOIN category c ON a.id_category = c.id
                WHERE " . implode(" OR ", $conditions);
        include("models/bdd.php");
        $res=$pdo->prepare($sql);
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
<div id="resultats">
    <div id="nbr">
        <?php  
            if ((count($tab))>1) {
                echo count($tab) . "résultats trouvés";
            }else { echo count($tab) . "résultat trouvé"; 
            }
        ?>
        </div>
        <?php for($i=0;$i<count($tab);$i++):  ?>
            <li>
                <strong><?php echo htmlspecialchars($tab[$i]['name_article']); ?></strong>
                (<?php echo htmlspecialchars($tab[$i]['category']); ?>)<br>
                <?php echo htmlspecialchars($tab[$i]['description']); ?>
            </li>
        <?php endfor; ?>
<?php } ?>
</div>