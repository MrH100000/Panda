<?php 
session_start();
require_once __DIR__. '/model/products.php';
$products = new Products();
if (isset($_GET['id'])) {
    $product = $products->getOne($_GET['id']);
} else {
    header('Location: products.php');
    exit();
}
require_once __DIR__ . '/view/product.php';
?>