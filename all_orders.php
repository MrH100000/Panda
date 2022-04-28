<?php 
session_start();
require_once __DIR__. '/model/orders.php';
require_once __DIR__. '/util/error_handling.php';
$orders = new Orders();
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $done = $orders->deleteOrder($id);
    if ($done === true) {
        unset($_POST['delete']);
        header('location: all_orders.php');
        exit();
    } else {
        $error_message = "Cannot delete order.";
    }
}else if (isset($_GET['query']) && $_GET['query'] !== "") {
    $value=$_GET['query'];
    $choice=$_GET['type'];
    if($choice==='product')
    {
        $orderList=$orders->searchByProduct($value);
    }
    else if ($choice==='username'){
        $orderList=$orders->searchByUsername($value);
    }
    if ($orderList !== false) {
        require_once __DIR__ . '/view/all_orders.php';
        exit;
    } else {
        handle_error("Cannot find order. Please try again.");
    }
}else{
    $orderList = $orders->getAll();
    require_once __DIR__ . '/view/all_orders.php';
}

?>