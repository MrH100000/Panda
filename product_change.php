<?php 
session_start();
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/util/error_handling.php';
$products = new Products();
if (isset($_POST['delete'])) {
    if (isset($_POST['id'])) {
        $product = $products->deleteProduct($_POST['id']);
        if ($product === true) {
            header('Location: edit_products.php');
            exit();
        } else {
            handle_error("Invalid ID passed to delete request");
        }
    } else {
        handle_error("Invalid ID passed to delete request");
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $products->getOne($_GET['id']);
} else {
    header('Location: edit_products.php');
    exit();
}
require_once __DIR__ . '/view/product_change.php';
?>