<?php require('models/add.php') ?>

<form action="index.php?page=add-product" method="POST">
    <label for="name_new">Entrez le nom du produit : </label>
    <input type="text" name="name" placeholder="nom" autocomplete="name"><br>
    <label for="name_new">Entrez la description du produit : </label>
    <input type="text" name="description" placeholder="description" autocomplete="description"><br>
    <label for="name_new">Entrez le lien de l'image du produit : </label>
    <input type="text" name="illustration" placeholder="lien" autocomplete="illustration"><br>
    <label for="name_new">Entrez le prix du produit : </label>
    <input type="text" name="price" placeholder="€" autocomplete="price"><br>
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