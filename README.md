# Clartée Ornée

## Description
Ce projet est un site e-commerce permettant la consultation de produits, la gestion d’un panier et le passage de commandes.  
Il est développé en environnement local à l’aide de **Wamp64** pour le serveur web et **Visual Studio Code** pour l’édition du code.

## Auteur
  - Mahé Provot
  - Achyl Janot
  - Antoine Ask
  - Anthonin Chesneau

## Technologies utilisées
- **Visual Studio Code** : éditeur de code
- **Wamp64** :
  - PHP
  - MySQL
- **HTML / CSS**
- **PHP** (back-end)
- **MySQL** (base de données)

## Prérequis
Avant de lancer le projet, assurez-vous d’avoir installé :
- Wamp64 (version compatible avec PHP et MySQL)
- Visual Studio Code
- Un navigateur web récent (Chrome, Firefox, Edge)

## Installation
1. Cloner ou télécharger le projet : https://github.com/Made154/Clart--Orn-e-projet-tranversal.git
3. Ensuite copier le MLD et le mettre dans un serveur sur wamp64 qui se nomme clarte_ornee en utf8mb4_general_ci
4. Puis cliquer sur notre lien pour accéder au site
5. Voilà vous avez accès à notre site web

## base de données
Résumé des tables :

  -Role(id, name)
  
  -User(id, id_role, name, surname, email, password, number, address, postal_code, date_inscription)
  
  -Messages(id, email, message, created_at)
  
  -Category(id, name)
  
  -Article(id, id_category, name, description, price, illustration, is_new, is_promo)
  
  -Basket(id, id_user)
  
  -BasketItems(id, id_basket, id_article, quantity)
  
  -Orders(id, id_user, total_amount, shipping_address, shipping_postal_code, shipping_country, shipping_city, order_status, created_at)
  
  -OrderItems(id, id_order, id_article, quantity, price)
  
  -Payment(id, id_user, amount, date_paiement, mode, status)
  
  -Notice(id, id_user, id_article, rating, comment, date_avis)
  
  -SearchBar(id, desgc, descg)

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
README.MD

assets/ : contenue permettant l’esthétique du site web
models/ : connexion et récupération des données de la database en local
Création_de_notre_base_de_donnée/ : script de création de la base de donnée
views/ : affichage HTML


