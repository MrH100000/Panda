<?php 
//this controller handles the checkout view and uses the orders and cart models for the user to checkout items in their cart
    session_start();
    require_once __DIR__. '/model/orders.php';
    require_once __DIR__. '/model/cart.php';
    require_once __DIR__. '/util/calc_order_total.php';
    //make instances of orders and cart
    $orders = new Orders();
    $cart = new Cart();
    //get the subtotal of the current cart
    $subtotal = $cart->getTotalValue();
    //create instance of orderCalculator using subtotal
    $orderCalculator = new OrderCalculator($subtotal);
    //get the total of the order (including tax and shipping)
    $total = $orderCalculator->calcOrderTotal();
    //get the shipping cost (15% of the order price)
    $shippingCost = $orderCalculator->calcOrderShipping();
    //get the taxes (10% of the order price)
    $taxes = $orderCalculator->calcOrderTax();
    //if all customer checkout information is set
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zipCode']) && isset($_POST['country']))
    {
        //call functio to add all information to order database, returns true if done correctly
        $done=$orders->addOrder($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zipCode'], $_POST['country'], $_POST['payment'], $total, $shippingCost, $taxes, $subtotal);
        //if function done true
        if($done===true)
        {
            //current orderID the most recent orderID (therefore the last orderID) so call to return that
            $id=$orders->getLastOrderID();
            //call to add all of the productIDs and the orderID to the order_product table
            $done = $orders->addToOrder_Product($cart->getAll(), $id);
            if($done===true)
            {
                //send user to the receipt page
                header('location: receipt.php');
                //exit
                exit;
            }
            
        }
        //if not then error message will show
        else
        {
            $error_message = "Order cannot be placed";
            //exit
            exit;
        }
    }
    //(default) if user is not submitting to checkout, they will be directed to the checkout page 
    require_once __DIR__ . '/view/checkout.php'; 
?>