<?php 
session_start();
require_once __DIR__. '/model/products.php';
$products = new Products();
$id="";
if (isset($_GET['id'])) {
    $product = $products->getOne($_GET['id']);
    $id=$_GET['id'];
} else {
    header('Location: editProducts.php');
    exit();
}
if (isset($_POST['delete'])) {
    $products = $product->deleteProduct($id);
    if ($products === false) {
        $error_message = "Username or password incorrect";
    } else {
        header('Location: editProducts.php');
        exit;
    }
}
require_once __DIR__ . '/view/productChange.php';
?>