<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$grandTotal = $_POST['grand_total'] ?? 0;
$grandTotal = is_numeric($grandTotal) ? (float)$grandTotal : 0;

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=inscription");
    exit;
}
?>

<div class="checkout-page">
    <h1 class="checkout-page__title">Finaliser ma commande</h1>

    <form action="models/process_checkout.php" method="POST" class="checkout-form">
        <input type="hidden" name="grand_total" value="<?= $grandTotal ?>">

        <div class="checkout-form__grid">

            <div class="checkout-form__section">
                <h2 class="checkout-form__section-title">Adresse de livraison</h2>

                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" placeholder="123 rue de la Lumière" required>

                <label for="city">Ville</label>
                <input type="text" id="city" name="city" placeholder="Paris" required>

                <label for="zip">Code postal</label>
                <input type="text" id="zip" name="zip" placeholder="75000" required>

                <label for="country">Pays</label>
                <input type="text" id="country" name="country" placeholder="France" required>
            </div>

            <div class="checkout-form__section">
                <h2 class="checkout-form__section-title">Paiement</h2>

                <label for="card">Numéro de carte</label>
                <input type="text" id="card" name="card" placeholder="1234 5678 9012 3456" required>

                <label for="expiry">Date d'expiration</label>
                <input type="text" id="expiry" name="expiry" placeholder="MM/AA" required>

                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123" required>

                <div class="checkout-form__total">
                    Total : <strong><?= number_format($grandTotal, 2) ?> €</strong>
                </div>

                <button type="submit" class="checkout-form__submit">Confirmer la commande</button>
            </div>

        </div>
    </form>
</div>
