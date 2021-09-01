<?php

//MySQL Connection
require ('../database/DBController.php');

// require classe Product
require ('../database/Product.php');

// Objet DBController 
$db = new DBController();

// Objet Product 
$product = new Product($db);

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}