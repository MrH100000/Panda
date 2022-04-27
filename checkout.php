<?php 
    session_start();
    require_once __DIR__. '/model/orders.php';
    require_once __DIR__. '/model/cart.php';
    $orders = new Orders();
    $cart= new Cart();
    $subtotal=$cart->getTotalValue();
    $total=$orders->getTotal($subtotal);
    $cartList=$cart->getAll();
    if(isset($_POST['submit']))
    {
        $id=$orders->addOrder($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zipCode'], $_POST['country'], $_POST['payment'], $total);
        if($id>0)
        {
            $done=$orders->addToOrder_Product($cartList, $id);
            if($done===true)
            {
                $_POST['submit']=false;
                header('location: /receipt.php');
                exit;
            }
            
        }
        //if not then error message will show
        else
        {
            $error_message = "Order cannot be placed";
        }
    }
    require_once __DIR__ . '/view/checkout.php'; 
?>