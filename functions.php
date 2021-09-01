<?php

// Connexion au base de données MySQL 
require ('database/DBController.php');

// Manipulation de données de la classe Product
require ('database/Product.php');

// Manipulation de données de la classe Cart
require ('database/Cart.php');


// Instanciation de l'objet DBController 
$db = new DBController();

// Instanciation de l'objet Product
$product = new Product($db);
//Objetenit toutes les données présentes à la base de données
$product_shuffle = $product->getData();

// Instanciation de l'objet Cart
$Cart = new Cart($db );


