<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clarté Ornée</title>
    <link rel="stylesheet" href="../../assests/css/add.css">

</head>

<?php require('../../models/add.php') ?>

<form action="add_product" method="POST">
    <label for="name_new">Entrez le nom du produit : </label>
    <input type="text" autocomplete="name"><br>
    <label for="name_new">Entrez la description du produit : </label>
    <input type="text" autocomplete="description"><br>
    <label for="name_new">Entrez le lien de l'image du produit : </label>
    <input type="text" autocomplete="price"><br>
    <label for="name_new">Entrez le prix du produit : </label>
    <input type="text" autocomplete="price"><br>
    <select id="type_produit" name="type_produit">
    <option value="Bureau">Bureau</option>
    <option value="Table">Table</option>
    <option value="Lampadaire">Lampadaire</option>
    <option value="Suspension">Suspension</option>
    <option value="Murale">Murale</option>
    <option value="LED">LED</option>
    <option value="Enfant">Enfant</option>
    </select><br>
    <button>Ajouter</button>
</form>