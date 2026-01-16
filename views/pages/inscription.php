<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="stars" id="stars"></div>

<div class="container">
    <div class="lamp-container">
        <div class="light-glow" id="glow"></div>
        <div class="lamp">
            <div class="lampshade sleeping" id="lampshade">
                <div class="face">
                    <div class="eye" id="eyeLeft"></div>
                    <div class="eye" id="eyeRight"></div>
                </div>
                <div class="mouth" id="mouth">
                    <div class="tongue"></div>
                </div>
                <div class="sleep-z">Z</div>
                <div class="sleep-z">Z</div>
                <div class="sleep-z">Z</div>
            </div>
            <div class="sleep-z">Z</div>
            <div class="sleep-z">Z</div>
            <div class="sleep-z">Z</div>
            <div class="pole">
                <div class="pull-cord" id="pullCord"></div>
            </div>
            <div class="base"></div>
        </div>
    </div>

    <div class="signup-form" id="signupForm">
        <div class="squareup">
            <h1>Créer un compte</h1>
            <p class="subtitle">Bienvenue dans notre Boutique ...</p>
        </div>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<p class="error">' . htmlspecialchars($_SESSION['error']) . '</p>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<p class="success-message">' . htmlspecialchars($_SESSION['success']) . '</p>';
            unset($_SESSION['success']);
        }
        ?>

        <div class="success-message" id="successMessage">
            Compte crée ! Bonne nuit... 😴
        </div>

        <form action="models/inscription_traitement.php" method="POST" id="inscriptionForm" class="form">
            <div class="inscri">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required placeholder="Dupont">

                <label for="surname">Prénom</label>
                <input type="text" id="surname" name="surname" required placeholder="Jean">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="votre@email.com">

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">

                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" id="password_confirm" name="password_confirm" required placeholder="••••••••">

                <label for="number">Numéro de téléphone</label>
                <input type="text" id="number" name="number" required placeholder="06 12 34 56 78">

                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" required placeholder="123 Rue de la Lampe">

                <label for="postal_code">Code postal</label>
                <input type="text" id="postal_code" name="postal_code" required placeholder="75001">

                <button type="submit">S'inscrire</button>
            </div>
        </form>

        <div class="link-connexion">
            <p>
                Déjà un compte ?
                <a href="index.php?page=connection">Se connecter</a>
            </p>
        </div>
    </div>
</div>

<div class="hint" id="hint">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="7 13 12 18 17 13"></polyline>
        <polyline points="7 6 12 11 17 6"></polyline>
    </svg>
    Réveille la lampe...
</div>

<script src="assests/js/inscription.js"></script>

