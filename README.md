# Clartée Ornée

## Description
Ce projet est un site e-commerce permettant la consultation de produits, la gestion d’un panier et le passage de commandes.  
Il est développé en environnement local à l’aide de **Wamp64** pour le serveur web et **Visual Studio Code** pour l’édition du code.

---

## Technologies utilisées
- **Visual Studio Code** : éditeur de code  
- **Wamp64**
  - PHP
  - MySQL
- **HTML / CSS**
- **PHP** (back-end)
- **MySQL** (base de données)

---

## Architecture du projet

```text
assets/
├── css/
│   └── app.css
├── img/
│   └── image1.png

Création_de_notre_base_de_donnée/
└── mld.sql

models/
├── add_to_basket.php
├── add.php
├── basket.php
├── bdd.php
├── connection_traitement.php
├── deconnection.php
├── inscription_traitement.php
├── item_display.php
├── remove_from_basket.php
├── send_contact.php
└── update-delete.php

views/
├── pages/
│   ├── add-product.php
│   ├── checkout.php
│   ├── connection.php
│   ├── home.php
│   ├── info-services.php
│   ├── inscription.php
│   ├── mentions-legales.php
│   ├── my-basket.php
│   ├── order_confirmation.php
│   ├── product.php
│   ├── shop.php
│   └── update.php
├── partials/
│   ├── _footer.php
│   ├── _navbar.php
│   ├── _search.php
│   └── _section.php

index.php
README.md

---
