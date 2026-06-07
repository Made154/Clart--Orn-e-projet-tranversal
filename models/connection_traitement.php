<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('bdd.php');

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $sql = "SELECT * FROM user WHERE email = :email";
    $query = $db->prepare($sql);
    $query->execute([':email' => $_POST['email']]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $storedPassword = $user['password'];
        $inputPassword  = $_POST['password'];

        $passwordOk = password_verify($inputPassword, $storedPassword)
                   || $inputPassword === $storedPassword;

        if ($passwordOk) {
            if ($inputPassword === $storedPassword) {
                $hashed = password_hash($inputPassword, PASSWORD_DEFAULT);
                $upd = $db->prepare("UPDATE user SET password = :p WHERE id = :id");
                $upd->execute([':p' => $hashed, ':id' => $user['id']]);
            }

            $_SESSION['user_id']      = $user['id'];
            $_SESSION['user_name']    = $user['name'];
            $_SESSION['user_surname'] = $user['surname'];
            $_SESSION['user_email']   = $user['email'];
            $_SESSION['user_role']    = $user['id_role'];

            header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=home");
            exit;

        } else {
            $_SESSION['error'] = "Mot de passe incorrect. Veuillez réessayer.";
            header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=connection");
            exit;
        }
    } else {
        $_SESSION['error'] = "Aucun compte trouvé avec cet email.";
        header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=connection");
        exit;
    }

} else {
    $_SESSION['error'] = "Veuillez remplir tous les champs.";
    header("Location: /Site-web/Clart--Orn-e-projet-tranversal/index.php?page=connection");
    exit;
}
?>
