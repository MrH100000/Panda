<?php
//this controller is for the receipt view and is used to display the reciept to the customer. uses the cart, orders, and products models
require_once __DIR__. '/model/cart.php';
require_once __DIR__. '/model/orders.php';
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/util/error_handling.php';
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
//creates instances of the products, cart, and order classes
$products = new Products();
$cart = new Cart();
$order = new Orders();
//gets all of the products in the cart to display
$productList = $cart->getAll();
//gets te order information by the order id to display
$orderInformation=$order->getOrderByID($order->getLastOrderID());
//clears all of the products from the cart after receipt creation 
$cart->clear();
//sends user to the reciept view
require_once __DIR__ . '/view/receipt.php';
?>