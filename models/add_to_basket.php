<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new PDO("mysql:host=localhost;dbname=clarte_ornee;charset=utf8", "root", "admin");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

require_once __DIR__ . "/basket.php";

$articleId = $_POST['article_id'] ?? null;
$quantity  = $_POST['quantity'] ?? 1;

$quantity = max(1, (int)$quantity); 

if (!$articleId) {
    die("No article selected.");
}

$stmt = $db->prepare("SELECT * FROM article WHERE id = :id");
$stmt->execute([':id' => $articleId]);
$article = $stmt->fetch();

if (!$article) {
    die("Article not found.");
}

$stmt = $db->prepare("
    SELECT id, quantity
    FROM basket_items
    WHERE id_basket = :id_basket
      AND id_article = :id_article
");
$stmt->execute([
    ':id_basket' => $_SESSION['id_basket'],
    ':id_article' => $articleId
]);

$existing = $stmt->fetch();

if ($existing) {

    $stmt = $db->prepare("
        UPDATE basket_items
        SET quantity = quantity + :qty
        WHERE id = :id
    ");
    $stmt->execute([
        ':qty' => $quantity,
        ':id'  => $existing['id']
    ]);
} else {

    $stmt = $db->prepare("
        INSERT INTO basket_items (id_basket, id_article, quantity)
        VALUES (:id_basket, :id_article, :quantity)
    ");
    $stmt->execute([
        ':id_basket' => $_SESSION['id_basket'],
        ':id_article' => $articleId,
        ':quantity'   => $quantity
    ]);
}

header("Location: ../index.php?page=shop");

exit;
?>

