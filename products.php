<?php 
require_once __DIR__. '/model/products.php';
$products = new Products();
$productList = $products->getAll();
require_once __DIR__ . '/view/products.php';
?>