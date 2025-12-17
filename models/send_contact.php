<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$db = new PDO("mysql:host=localhost;dbname=clarte_ornee;charset=utf8", "root", "admin");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$confirmationMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $confirmationMessage = "L'email n'est pas valide.";
    } elseif (empty($message)) {
        $confirmationMessage = "Le message ne peut pas être vide.";
    } else {
        $stmt = $db->prepare("INSERT INTO messages (email, message) VALUES (:email, :message)");
        $stmt->execute([
            ':email' => $email,
            ':message' => $message
        ]);
        $confirmationMessage = "Votre message a été envoyé avec succès !";
    }
}
?>
