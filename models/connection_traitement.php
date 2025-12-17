<?php
session_start(); 

include('bdd.php'); 

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    
    $sql = "SELECT * FROM user WHERE email = :email";
    $query = $db->prepare($sql);
    $query->execute([
        ':email' => $_POST['email']
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        
        if (password_verify($_POST['password'], $user['password'])) {

            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_surname'] = $user['surname'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['id_role'];

           
            header("Location: ../index.php?page=home"); 
            exit;

        } else {
            
            $_SESSION['error'] = "Mot de passe incorrect.";
            header("Location: ../index.php?page=connection");
            exit;
        }

    } else {
        
        $_SESSION['error'] = "Email non enregistré.";
        header("Location: ../index.php?page=connection");
        exit;
    }

} else {
    
    $_SESSION['error'] = "Veuillez remplir tous les champs.";
    header("Location: ../index.php?page=connection");
    exit;
}
?>
