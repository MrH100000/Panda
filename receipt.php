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
$orderInformation=$order->getOrderByID($order->getLastOrderID());
//$cart->clear();
require_once __DIR__ . '/view/receipt.php';
?>