<?php 
    session_start();
    require_once __DIR__. '/model/orders.php';
    $orders = new Orders();
    if(isset($_POST['submit']))
    {
        $done=$orders->addToOrder($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zipCode'], $_POST['country'], $_POST['payment']);
        if($done===true)
        {
            echo "success";
            $_POST['submit']=false;
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