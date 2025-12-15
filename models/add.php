<?php

include('bdd.php');

if (!empty($_POST)) {
	$sql = "INSERT INTO article(name, description, illustration, price, id_category, is_new) VALUES(:name, :description, :illustration, :price, :id_category, 1)";
	$query = $db->prepare($sql);
	$query->execute([
		':name' => $_POST['name'],
        ':description' => $_POST['description'],
        ':illustration' => $_POST['illustration'],
		':price' => $_POST['price'],
		':id_category' => $_POST['id_category'],
	]);
	header("Location: index.php?page=shop");
}

?>