<?php

include('bdd.php');

if (isset($_GET['id'])) {


    $article_id = $_GET['id'];

    $sql = "SELECT * FROM article
    WHERE id = :article_id";
    $query = $db->prepare($sql);
    $query->bindParam(':article_id', $article_id, PDO::PARAM_INT);
    $query->execute();

    $article = $query->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        die("Produit introuvable");
    }

} else {

    die("Produit introuvable");

}
?>
