<?php
require_once __DIR__. '/model/cart.php';
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/util/error_handling.php';
// Filter the user-provided input
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

$products = new Products();
$cart = new Cart();

// If the user wants to add a product to the cart
if (isset($_POST['add']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    // Make sure the specified quantity is valid
    if (intval($_POST['quantity']) < 1 || intval($_POST['quantity']) > 1000000) {
        handle_error("Invalid quantity");
    }
    // Retrieve the product
    $product = $products->getOne($_POST['product_id']);
    if ($product === false) {
        handle_error('No product matching that ID was found');
    }
    // Add the product to the cart session
    $cart->add($product, intval($_POST['quantity']));
    // Return the user back to the products page
    header('Location: products.php');
    exit();
} else if (isset($_POST['delete']) && isset($_POST['product_id'])) {
    // If the user wants to delete an item, remove it from the cart
    $cart->delete($_POST['product_id']);
} else if (isset($_POST['clear'])) {
    // If the user wants to clear the cart, remove all items from the cart
    $cart->clear();
}

// Get all the items in the cart, and the subtotal (cost for all items in the cart)
$productList = $cart->getAll();
$cartTotal = $cart->getTotalValue();

require_once __DIR__ . '/view/cart.php';
?>