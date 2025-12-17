<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_user = $_SESSION['user_id']; 

if (!$id_user) {
    echo "You must be logged in to complete the checkout.";
    exit;
}

try {
    $db = new PDO("mysql:host=localhost;dbname=clarte_ornee;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$address = htmlspecialchars(trim($_POST['address'] ?? ''));
$city = htmlspecialchars(trim($_POST['city'] ?? ''));
$zip = htmlspecialchars(trim($_POST['zip'] ?? ''));
$country = htmlspecialchars(trim($_POST['country'] ?? ''));

$grandTotal = (float)$_POST['grand_total']; 

if (!is_numeric($grandTotal) || $grandTotal <= 0) {
    echo "Invalid total amount.";
    exit;
}

if (empty($address) || empty($city) || empty($zip) || empty($country)) {
    echo "Shipping details are incomplete.";
    exit;
}

$full_address = $address . ', ' . $city . ', ' . $zip . ', ' . $country;

try {
    $db->beginTransaction();

    $stmt = $db->prepare("INSERT INTO orders (id_user, total_amount, shipping_address, shipping_postal_code, shipping_country, shipping_city, order_status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id_user, $grandTotal, $full_address, $zip, $country, $city, 'Pending']);
    $orderId = $db->lastInsertId();

    $orderItemsValues = [];
    $stmt = $db->prepare("
        SELECT bi.id_article, bi.quantity, a.price 
        FROM basket_items bi
        JOIN article a ON bi.id_article = a.id
        WHERE bi.id_basket = (SELECT id FROM basket WHERE id_user = ?)
    ");
    $stmt->execute([$id_user]);
    $basketItems = $stmt->fetchAll();

    foreach ($basketItems as $item) {
        $orderItemsValues[] = "(" . $orderId . ", " . $item['id_article'] . ", " . $item['quantity'] . ", " . $item['price'] . ")";
    }

    if (!empty($orderItemsValues)) {
        $sql = "INSERT INTO order_items (id_order, id_article, quantity, price) VALUES " . implode(",", $orderItemsValues);
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    $stmt = $db->prepare("DELETE FROM basket_items WHERE id_basket = (SELECT id FROM basket WHERE id_user = ?)");
    $stmt->execute([$id_user]);

    $stmt = $db->prepare("DELETE FROM basket WHERE id_user = ?");
    $stmt->execute([$id_user]);

    $db->commit();

    $stmt = $db->prepare("UPDATE payment SET status = 'Payé' WHERE id_user = ? AND amount = ?");
    $stmt->execute([$id_user, $grandTotal]);
    header("Location: ../index.php?page=order_confirmation&orderId=$orderId&grandTotal=" . urlencode($grandTotal));
exit;

} catch (Exception $e) {
    $db->rollBack();
    echo "Error: " . $e->getMessage();
} 
?>

