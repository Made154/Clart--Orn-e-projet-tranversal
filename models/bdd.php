<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    $db = new PDO("mysql:host=localhost;dbname=clarte_ornee;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<b>Erreur de connexion à la base de données :</b> " . $e->getMessage());
}

try {
    $sql = "SELECT * FROM article";
    $query = $db->query($sql);
    $article = $query->fetchAll();
} catch (PDOException $e) {
    $article = [];
}

?>
