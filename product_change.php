<?php 
session_start();
require_once __DIR__. '/model/products.php';
$products = new Products();
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $product = $products->getOne($_GET['id']);
} else {
    header('Location: edit_products.php');
    exit();
}
if (isset($_POST['delete'])) {
    $product = $products->deleteProduct($id);
    if ($product === true) {
        header('Location: edit_products.php');
    } else {
        $error_message = "Product cannot be found / deleted";
        exit;
    }
}
require_once __DIR__ . '/view/product_change.php';
?>