<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


    <div class="squareup">
        <h1>Connexion</h1>
    </div>
    <?php if (isset($_GET["erreur"])): ?>
        <p class="error">Email ou mot de passe incorrect</p>
    <?php endif; ?>

    <form action="../../traitement/connexion_traitement.php" method="POST" class="form">
        <div class="inscri">
            <label>Email</label>
            <input type="email" name="email" required>

            <label>Mot de passe</label>
            <input type="password" name="password" required>

            <button type="submit">Se connecter</button>
        </div>
    </form>
            <p class="link-inscription">
            Pas encore de compte ?
            <a href="index.php?page=inscription">Crée un compte</a>
            </p>

