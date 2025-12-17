<?php
session_start();

// Détruit toutes les variables de session
$_SESSION = [];

// Détruit la session
session_destroy();

// Redirection vers la page de connexion ou accueil
header("Location: ../index.php?page=connection");
exit;
