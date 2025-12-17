<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$grandTotal = $_POST['grand_total'] ?? 0;

$grandTotal = is_numeric($grandTotal) ? (float)$grandTotal : 0;

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=inscription");
    exit;
}

var_dump($_POST['grand_total']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat</title>
</head>
<body>

<div class="square">

    <h1 class="Nom_boutique">Checkout</h1>

    <form action="models/process_checkout.php" method="POST">

        <div class="checkout-container">

            <div class="shipping-address form_modif">
                <h2>Shipping Address</h2>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="123 Main St" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" placeholder="City" required>

                <label for="zip">ZIP Code:</label>
                <input type="text" id="zip" name="zip" placeholder="12345" required>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" placeholder="Country" required>
            </div>

            <div class="payment-info form_modif">
                <h2>Payment Details</h2>

                <label for="card">Card Number:</label>
                <input type="text" id="card" name="card" placeholder="1234 5678 9012 3456" required>

                <label for="expiry">Expiry Date:</label>
                <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="123" required>

                <h1>Total: <?= number_format($grandTotal, 2) ?> €</h1>
                <input type="hidden" name="grand_total" value="<?= $grandTotal ?>">
                <button type="submit">Place Order</button>  
            </div>

        </div>

     

    </form>

  

</div>

</body>
</html>

