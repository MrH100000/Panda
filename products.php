<?php 
//this controller is used for the products view and displays all products in the database to the user. uses the products model
session_start();
require_once __DIR__. '/model/products.php';

// Include the products model
$products = new Products();
// Get all the products in the database
$productList = $products->getAll();

// Display the products view
require_once __DIR__ . '/view/products.php';
?>