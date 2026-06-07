<?php
$orderId    = $_GET['orderId']    ?? null;
$grandTotal = $_GET['grandTotal'] ?? null;
?>

<div class="confirmation-page">
    <?php if ($orderId && $grandTotal): ?>
    <div class="confirmation-card">
        <div class="confirmation-card__icon">✓</div>
        <h1 class="confirmation-card__title">Merci pour votre commande !</h1>
        <p class="confirmation-card__subtitle">Votre commande a été passée avec succès.</p>

        <div class="confirmation-card__details">
            <div class="confirmation-card__row">
                <span>Numéro de commande</span>
                <strong>#<?= htmlspecialchars($orderId) ?></strong>
            </div>
            <div class="confirmation-card__row">
                <span>Montant total</span>
                <strong><?= number_format($grandTotal, 2) ?> €</strong>
            </div>
            <div class="confirmation-card__row">
                <span>Statut</span>
                <strong>En cours de traitement</strong>
            </div>
        </div>

        <p class="confirmation-card__note">Un email de confirmation avec les détails de suivi vous sera envoyé prochainement.</p>

        <a href="index.php?page=home" class="confirmation-card__btn">Retour à l'accueil</a>
    </div>
    <?php else: ?>
    <p class="confirmation-error">Informations de commande manquantes.</p>
    <?php endif; ?>
</div>
