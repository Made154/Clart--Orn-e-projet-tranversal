
<link rel="stylesheet" href="assests/css/add.css">

<body>

    <?php require('models/add.php') ?>

    <div class="add-form">
        <form action="index.php?page=add-product" method="POST">
            <label for="name_new">Entrez le nom du produit : </label>
            <input type="text" name="name" placeholder="nom" autocomplete="name">
            <label for="name_new">Entrez la description du produit : </label>
            <input type="text" name="description" placeholder="description" autocomplete="description">
            <label for="name_new">Entrez le lien de l'image du produit : </label>
            <input type="text" name="illustration" placeholder="lien" autocomplete="illustration">
            <label for="name_new">Entrez le prix du produit : </label>
            <input type="text" name="price" placeholder="€" autocomplete="price">
            <label for="name_new">Entrez le type en id du produit : </label>
            <input type="text" name="id_category" placeholder="ID" autocomplete="type">
            <button>Ajouter</button>
        </form>
    </div>

</body>
