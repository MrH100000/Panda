<?php 
session_start();
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/model/cart.php';
$products = new Products();
$cart = new Cart();
if (isset($_GET['id'])) {
    $product = $products->getOne($_GET['id']);
    $inCart = false;
    if ($cart->getOne($_GET['id']) !== false) {
        $inCart = true;
    }
} else {
    header('Location: products.php');
    exit();
}
require_once __DIR__ . '/view/product.php';
?>