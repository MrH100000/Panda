<?php
require_once __DIR__. '/model/cart.php';
require_once __DIR__. '/model/orders.php';
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/util/error_handling.php';
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
$products = new Products();
$cart = new Cart();
$order = new Orders();
$productList = $cart->getAll();
<<<<<<< HEAD
$orderInformation=$order->getOrderByID($order->getLastOrderID());
//$cart->clear();
=======
$cartTotal = $cart->getTotalValue();
$cart->clear();
>>>>>>> eeb06b02d0916ff9368a9154c9dfdd05ff5d3b41
require_once __DIR__ . '/view/receipt.php';
?>