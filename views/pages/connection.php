<div class="container">
    <div class="lamp-container">
        <div class="light-glow" id="glow"></div>
        <div class="lamp">
            <div class="lampshade" id="lampshade">
                <div class="face">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth">
                    <div class="tongue"></div>
                </div>
            </div>
            <div class="pole">
                <div class="pull-cord" id="pullCord"></div>
            </div>
            <div class="base"></div>
        </div>
    </div>

    <div class="login-form" id="loginForm">
        <div class="squareup">
            <h1>Connexion</h1>
        </div>

        <?php if (isset($_GET["erreur"])): ?>
            <p class="error">Email ou mot de passe incorrect</p>
            <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="models/connection_traitement.php" method="POST" class="form">
            <div class="inscri">
                <label>Email</label>
                <input type="email" name="email" required placeholder="votre@email.com">

                <label>Mot de passe</label>
                <input type="password" name="password" required placeholder="••••••••">

                <button type="submit">Se connecter</button>
            </div>
        </form>

        <div class="link-inscription">
            <p>
                Pas encore de compte ?
                <a href="index.php?page=inscription">Crée un compte</a>
            </p>
        </div>
    </div>
</div>

<div class="hint" id="hint">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="7 13 12 18 17 13"></polyline>
        <polyline points="7 6 12 11 17 6"></polyline>
    </svg>
    Tirez sur la cordelette ! 
</div>

<script src="assests/js/connection.js"></script>