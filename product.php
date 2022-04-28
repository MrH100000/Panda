<?php 
//this controller is used for the product page which displays individual products after they are selected and ses the products and cart model
session_start();
// Include the necessary models
require_once __DIR__. '/util/error_handling.php';
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/model/cart.php';

$products = new Products();
$cart = new Cart();

// If the id parameter is set (this is the product id)
if (isset($_GET['id'])) {
    // Retrieve the product matching the id
    $product = $products->getOne($_GET['id']);
    // Return an error if the product does not exist
    if ($product === false) {
        handle_error('No product matching that ID was found');
    }
} else {
    // Otherwise, just redirect to the products list
    header('Location: products.php');
    exit();
}
require_once __DIR__ . '/view/product.php';
?>