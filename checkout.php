<?php 
    session_start();
    require_once __DIR__. '/model/orders.php';
    require_once __DIR__. '/model/cart.php';
    require_once __DIR__. '/util/calc_order_total.php';

    $orders = new Orders();
    $cart = new Cart();
    $subtotal = $cart->getTotalValue();
    $orderCalculator = new OrderCalculator($subtotal);
    $total = $orderCalculator->calcOrderTotal();
    $shippingCost = $orderCalculator->calcOrderShipping();
    $taxes = $orderCalculator->calcOrderTax();
    
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zipCode']) && isset($_POST['country']))
    {
        $done=$orders->addOrder($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zipCode'], $_POST['country'], $_POST['payment'], $total, $shippingCost, $taxes, $subtotal);
        if($done===true)
        {
            $id=$orders->getLastOrderID();
            $done = $orders->addToOrder_Product($cart->getAll(), $id);
            if($done===true)
            {
                header('location: receipt.php');
                exit;
            }
            
        }
        //if not then error message will show
        else
        {
            $error_message = "Order cannot be placed";
            exit;
        }
    }
    require_once __DIR__ . '/view/checkout.php'; 
?>