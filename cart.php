<?php
require_once __DIR__. '/model/cart.php';
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/util/error_handling.php';
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

$products = new Products();
$cart = new Cart();

if (isset($_POST['add']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    if (intval($_POST['quantity']) < 1 || intval($_POST['quantity']) > 1000000) {
        handle_error("Invalid quantity");
    }
    $product = $products->getOne($_POST['product_id']);
    $cart->add($product, intval($_POST['quantity']));
    header('Location: products.php');
    exit();
} else if (isset($_POST['delete']) && isset($_POST['product_id'])) {
    $cart->delete($_POST['product_id']);
} else if (isset($_POST['clear'])) {
    $cart->clear();
    // header('Location: cart.php');
}

$productList = $cart->getAll();
$cartTotal = $cart->getTotalValue();

require_once __DIR__ . '/view/cart.php';
?>