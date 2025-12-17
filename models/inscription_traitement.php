<?php

include('bdd.php');

if (!empty($_POST)) {
	$sql = "INSERT INTO user(id_role, name, surname, email, password, number, address, postal_code, date_inscription) VALUES(:id_role, :name, :surname, :email, :password, :number, :address, :postal_code, :date_inscription)";
	$query = $db->prepare($sql);
	$query->execute([
		':name' => $_POST['name'],
        ':surname' => $_POST['surname'],
        ':email' => $_POST['email'],
		':password' => $_POST['password'],
		':number' => $_POST['number'],
        ':address' => $_POST['address'],
        ':postal_code' => $_POST['postal_code'],
        ':id_role' => 2,
        ':date_inscription' => date('Y-m-d')
	]);
	header("Location: ../index.php?page=connection");
}

?>