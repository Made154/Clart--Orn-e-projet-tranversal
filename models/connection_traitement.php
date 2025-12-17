<?php
session_start(); // Toujours en premier

include('bdd.php'); // connexion à la base

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    // Récupérer l'utilisateur par email
    $sql = "SELECT * FROM user WHERE email = :email";
    $query = $db->prepare($sql);
    $query->execute([
        ':email' => $_POST['email']
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Vérifier le mot de passe haché
        if (password_verify($_POST['password'], $user['password'])) {

            // Mot de passe correct → créer session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_surname'] = $user['surname'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['id_role'];

            // Redirection vers la page protégée
            header("Location: ../index.php?page=home"); 
            exit;

        } else {
            // Mot de passe incorrect
            $_SESSION['error'] = "Mot de passe incorrect.";
            header("Location: ../index.php?page=connection");
            exit;
        }

    } else {
        // Email non trouvé
        $_SESSION['error'] = "Email non enregistré.";
        header("Location: ../index.php?page=connection");
        exit;
    }

} else {
    // Formulaire incomplet
    $_SESSION['error'] = "Veuillez remplir tous les champs.";
    header("Location: ../index.php?page=connection");
    exit;
}
?>
