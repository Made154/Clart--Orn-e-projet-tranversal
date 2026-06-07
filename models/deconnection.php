<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = [];
session_destroy();

header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=home");
exit;
