<link rel="stylesheet" href="assests/css/_navbar.css">

<nav class="navbar">
    <a href="index.php?page=home" class="logo"><img src="assests/img/logo-lampe.png"></a>

    <div class="search-container">
        <?php include('views/partials/_search.php') ?>
    </div>

    <div class="liens-container">
        <a href="index.php?page=info-services" class="Lien"><img src="assests/img/icone-info.png"> Info-services</a>
        <a href="index.php?page=shop" class="Lien"><img src="assests/img/icone-shop.png"> Boutique</a>
        <a href="index.php?page=my-basket" class="Lien"><img src="assests/img/icone-panier.png"> Mon panier</a>
        <a href="index.php?page=connection" class="Lien"><img src="assests/img/icone-profil.png"> Connexion</a>
    </div>
</nav>
