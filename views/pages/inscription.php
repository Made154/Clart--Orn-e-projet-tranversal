<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="squareup">
    <h1>Créer un compte</h1>
</div>

<?php
// Affichage des messages d'erreur ou de succès
if (isset($_SESSION['error'])) {
    echo '<p style="color:red;">'.$_SESSION['error'].'</p>';
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo '<p style="color:green;">'.$_SESSION['success'].'</p>';
    unset($_SESSION['success']);
}
?>

<form action="models/inscription_traitement.php" method="POST">
    <div class="inscri">

        <label for="nom">Nom</label>
        <input type="text" id="name" name="name" required>

        <label for="prenom">Prénom</label>
        <input type="text" id="surname" name="surname" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirm">Confirmer le mot de passe</label>
        <input type="password" id="password_confirm" name="password_confirm" required>

        <!-- Optionnel : numéro, adresse, code postal -->
        <label for="number">Numéro de téléphone</label>
        <input type="text" id="number" name="number" required>

        <label for="address">Adresse</label>
        <input type="text" id="address" name="address" required>

        <label for="postal_code">Code postal</label>
        <input type="text" id="postal_code" name="postal_code" required>

        <button type="submit">S'inscrire</button>

    </div>
</form>
