<?php 
    session_start();
    require_once __DIR__. '/model/products.php';
    $products = new Products();
    $productList = $products->getAll();
    if(isset($_POST['submit']))
    {
        $done=$products->createProduct($_POST['name'], $_POST['description'], $_POST['price'], 'images/'.$_POST['image']);
        if($done===true)
        {
            require_once __DIR__ . '/view/editProduct.php';
            exit;
        }
        //if not then error message will show
        else
        {
            $error_message = "Product is already created. Please add a new product";
        }
    }
    require_once __DIR__ . '/view/editProduct.php'; 
?>