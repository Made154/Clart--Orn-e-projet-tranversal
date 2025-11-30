<?php

$db = new PDO("mysql:host=localhost;dbname=clarte_ornee;charset=utf8", "root", "");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$sql = "SELECT * FROM article";
$query = $db->query($sql);
$article = $query->fetchAll();

?>