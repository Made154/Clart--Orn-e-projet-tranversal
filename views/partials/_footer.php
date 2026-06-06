<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="assests/css/_footer.css">
<footer>

    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['user_surname'])): ?>
        <p>
            Connecté : <strong><?= htmlspecialchars($_SESSION['user_name'] . ' ' . $_SESSION['user_surname']); ?></strong>
        </p>
        <form action="models/deconnection.php" method="POST" style="display:inline;">
            <button type="submit" style="padding:5px 10px; cursor:pointer;">Déconnexion</button>
        </form>
    <?php else: ?>
        <p>Vous n'êtes pas connecté.</p>
    <?php endif; ?>

    <h2>Clarté Ornée</h2>
        <p>Lumière & Élégance pour votre intérieur</p>


    <div class="footer-contact">
        <p>📍 Bordeaux, France</p>
        <p>📧 contact@clarteornee.fr</p>
        <p>📞 +33 1 23 45 67 89</p>
    </div>


    <div class="footer-socials">
        <a href="#">Instagram</a> ·
        <a href="#">Facebook</a> ·
        <a href="#">Pinterest</a>
    </div>


    <div class="footer">
        <p>© 2025 Clarté Ornée — Tous droits réservés</p>
        <a href="index.php?page=mentions-legales" class="Lien">Mentions légales</a>
    </div>
</footer>