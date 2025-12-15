<?php

include('models/bdd.php'); 

if (!isset($_GET['id'])) {
    die("ID manquant");
}

$sqlSelect = "SELECT * FROM article WHERE id = " . $_GET['id'];
$query = $db->query($sqlSelect);
$article = $query->fetch();

if (!empty($_POST)) {
		
	if (isset($_POST['id'])) {
		$sql = "DELETE FROM article WHERE id = " . $_POST['id'];
		$query = $db->exec($sql);
		
	} else {
		$sqlUpdate = "UPDATE article SET name = '" . $_POST['name'] . "', id_category = '" . $_POST['id_category'] . "', description = '" . $_POST['description'] . "', illustration = '" . $_POST['illustration'] . "', is_new = '" . $_POST['is_new'] . "', is_promo = '" . $_POST['is_promo'] . "',   price = " . $_POST['price'] . " WHERE id = " . $_GET['id'];
		$query = $db->exec($sqlUpdate);
	}
	header("Location: index.php?page=shop");
	exit;
}
