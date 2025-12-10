<?php

include('models/bdd.php');

if (!empty($_POST)) {
	$sql = "INSERT INTO article(name, description, illustration, price, new) VALUES(:name, :description, :illustration, :price, 1)";
	$query = $db->prepare($sql);
	$query->execute([
		':name' => $_POST['name'],
        ':description' => $_POST['descritpion'],
        ':illustration' => $_POST['illustration'],
		':price' => $_POST['price'],
	]);
	header("Location: index.php?page=shop.php");
}

?>