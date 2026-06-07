<?php
include('bdd.php');

if (empty($_POST)) {
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=inscription");
    exit;
}

$name        = trim($_POST['name']             ?? '');
$surname     = trim($_POST['surname']          ?? '');
$email       = trim($_POST['email']            ?? '');
$password    = $_POST['password']              ?? '';
$password2   = $_POST['password_confirm']      ?? '';
$number      = trim($_POST['number']           ?? '');
$address     = trim($_POST['address']          ?? '');
$postal_code = trim($_POST['postal_code']      ?? '');

if (!$name || !$surname || !$email || !$password || !$number || !$address || !$postal_code) {
    $_SESSION['error'] = "Veuillez remplir tous les champs.";
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=inscription");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "L'adresse email n'est pas valide.";
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=inscription");
    exit;
}

if ($password !== $password2) {
    $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=inscription");
    exit;
}

if (strlen($password) < 6) {
    $_SESSION['error'] = "Le mot de passe doit contenir au moins 6 caractères.";
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=inscription");
    exit;
}

try {
    $check = $db->prepare("SELECT id FROM user WHERE email = :email");
    $check->execute([':email' => $email]);
    if ($check->fetch()) {
        $_SESSION['error'] = "Un compte existe déjà avec cet email.";
        header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=inscription");
        exit;
    }
} catch (PDOException $e) {
    die("<b>Erreur lors de la vérification email :</b> " . $e->getMessage() . "<br>Vérifiez que la table 'user' existe dans phpMyAdmin.");
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (id_role, name, surname, email, password, number, address, postal_code, date_inscription)
        VALUES (:id_role, :name, :surname, :email, :password, :number, :address, :postal_code, :date_inscription)";

try {
    $query = $db->prepare($sql);
    $query->execute([
        ':id_role'          => 2,
        ':name'             => $name,
        ':surname'          => $surname,
        ':email'            => $email,
        ':password'         => $passwordHash,
        ':number'           => $number,
        ':address'          => $address,
        ':postal_code'      => $postal_code,
        ':date_inscription' => date('Y-m-d'),
    ]);
    $_SESSION['success'] = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=connection");
} catch (PDOException $e) {
    die("<b>Erreur SQL lors de l'inscription :</b> " . $e->getMessage());
}
exit;
