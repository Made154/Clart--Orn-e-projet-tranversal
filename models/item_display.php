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
    <div class="product-card">

        <img
        src="<?php echo htmlspecialchars($article['illustration']); ?>"
        alt="The Len Chair"
        class="product-card__image"
        />

        <div class="product-card__details">
        <h2 class="product-card__title"><?php echo htmlspecialchars($article['name']); ?></h2>
        <span class="product-card__price"><?php echo htmlspecialchars($article['price']); ?>€</span>
        </div>

        <a href="index.php?page=product">
            <button class="product-card__button" type="button">
            Ajouter au panier • <img src="assests/img/icone-cadi.png">
            </button>
        </a>
    </div>
<?php 
    }
} else {

} ?>
