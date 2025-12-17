<?php 

$orderId = $_GET['orderId'] ?? null;
$grandTotal = $_GET['grandTotal'] ?? null;

if ($orderId && $grandTotal) {
} else {
    echo "Error: Missing order details.";
}

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Order Confirmation</title>
    <link rel='stylesheet' href='/Clart--Orn-e-projet-tranversal/assets/css/app.css'>
</head>
<body>

    <div class='square'>
        <h1>Thank you for your order!</h1>
        <h2 style="color: white;">Your order has been successfully placed.</h2>

        <div class='order-details' style="color: white">
            <h2>Order Details:</h2>
            <p><strong>Order ID:</strong> <?= htmlspecialchars($orderId) ?> </p>
            <p><strong>Total Amount:</strong> <?= number_format($grandTotal, 2) ?> €</p>
            <p><strong>Status:</strong> Pending</p>
            <p>We will send you an email with the tracking details once your order is processed.</p>
        </div>

        <a href='index.php?page=home' class='Lien'>Go to Home Page</a>
    </div>

</body>
</html>"
