<?php 
    session_start();
    require_once __DIR__. '/model/orders.php';
    require_once __DIR__. '/model/cart.php';
    $orders = new Orders();
    $cart= new Cart();
    $subtotal=$cart->getTotalValue();
    $total=$orders->getTotal($subtotal);
    if(isset($_POST['submit']))
    {
        $done=$orders->addToOrder($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zipCode'], $_POST['country'], $_POST['payment'], $total);
        if($done===true)
        {
            $_POST['submit']=false;
            header('location: /receipt.php');
            exit;
        }
        //if not then error message will show
        else
        {
            $error_message = "Order cannot be placed";
        }
    }
    require_once __DIR__ . '/view/checkout.php'; 
?>