<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$stmt = $db->prepare("
    SELECT bi.*, a.name, a.price
    FROM basket_items bi
    JOIN article a ON bi.id_article = a.id
    WHERE bi.id_basket = :id_basket
");
$stmt->execute([':id_basket' => $_SESSION['id_basket']]);
$basketItems = $stmt->fetchAll();

echo "<pre>";
print_r($basketItems);
echo "</pre>";
echo "Session id_basket: " . ($_SESSION['id_basket'] ?? 'not set') . "<br>";
?>
