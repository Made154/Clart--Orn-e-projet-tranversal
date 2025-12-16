<?php 

if (isset($id_category) && is_numeric($id_category)) {

    $sql = "SELECT * FROM article
            WHERE id_category = :id_category";
    
    $query = $db->prepare($sql);
    $query->bindParam(':id_category', $id_category, PDO::PARAM_INT);
    $query->execute();

    $articles_by_category = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($articles_by_category as $article) {

?>

    <a href="index.php?page=product&id=<?php echo htmlspecialchars($article['id']); ?>">

        <div class="article_item">
            <h3><?php echo htmlspecialchars($article['name']); ?></h3>

            <img src='<?php echo htmlspecialchars($article['illustration']); ?> alt=''>
            <p>Prix : <?php echo htmlspecialchars($article['price']); ?> €</p>
        </div>

<?php 
    }
} else {

} ?>