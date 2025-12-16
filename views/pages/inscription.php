<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="squareup">
    <h1>Créer un compte</h1>
</div>
    <form action="../../traitement/inscription_traitement.php" method="POST">
    <div class="inscri">
        <label>Nom</label>
        <input type="text" name="nom" required>

        <label>Prénom</label>
        <input type="text" name="prenom" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Mot de passe</label>
        <input type="password" name="password" required>

        <label>Confirmer le mot de passe</label>
        <input type="password" name="password_confirm" required>

        <button type="submit">S'inscrire</button>
    </div>
    </form>
</div>