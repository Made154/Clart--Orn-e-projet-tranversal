<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new PDO("mysql:host=localhost;dbname=clarte_ornee;charset=utf8", "root", "admin");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (!isset($_SESSION['id_basket'])) {
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

    $stmt = $db->prepare("INSERT INTO basket (id_user) VALUES (:id_user)");
    $stmt->execute([':id_user' => $userId]);

    $_SESSION['id_basket'] = $db->lastInsertId();
}

$stmt = $db->prepare("SELECT * FROM basket WHERE id = :id_basket");
$stmt->execute(['id_basket' => $_SESSION['id_basket']]);$basket = $stmt->fetch();
echo "Session id_basket: " . ($_SESSION['id_basket'] ?? 'none') . "<br>";
echo "<pre>";
print_r($basket);
echo "</pre>";

if(!$basket) {
    $stmt = $db->prepare("INSERT INTO basket (id_user) VALUES (:id_user)");
    $stmt->execute([':id_user'=> $userId]);
    $_SESSION['id_basket'] = $db->lastInsertId();
}
var_dump($_SESSION);
?>
