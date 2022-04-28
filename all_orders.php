<?php 
//this controller is used for the all_order view to display all of the orders in the database for the admin and uses the orders model
session_start();
require_once __DIR__. '/model/orders.php';
require_once __DIR__. '/util/error_handling.php';
//create new order instance
$orders = new Orders();
//checks if admin has pressed to delete an order
if (isset($_POST['delete']) && isset($_POST['id'])) {
    //sets id
    $id = $_POST['id'];
    //order calls delete order and passes the id of the order to delete
    $done = $orders->deleteOrder($id);
    //if done is true then the function returned true 
    if ($done === true) {
        //unset the delete button
        unset($_POST['delete']);
        //redirect to all_orders (here) to show the new order list 
        header('location: all_orders.php');
        //exit so nothing else runs
        exit();
    } else {
        //error handling
        $error_message = "Cannot delete order.";
    }
    //if admin is not deleting, check if they are searching the orders
}else if (isset($_GET['query']) && $_GET['query'] !== "") {
    //value is set, it is a textbox the user fills in
    $value=$_GET['query'];
    //type is either username or product and it is the type of search being done
    $choice=$_GET['type'];
    //if the choice is product then search by product
    if($choice==='product')
    {
        //search by product and return a new order list of orders associated with the product id
        $orderList=$orders->searchByProduct($value);
    }
    //if the choice is username then search by username
    else if ($choice==='username'){
        //orders searches by username and returns a list of orders associated with the username
        $orderList=$orders->searchByUsername($value);
    }
    //as long as something came back from either query
    if ($orderList !== false) {
        //redirect to the all_orders view to see updated list
        require_once __DIR__ . '/view/all_orders.php';
        //exit
        exit;
    } else {
        //error handling
        handle_error("Cannot find order. Please try again.");
    }
//if none of the above (so automatically unless searching or deleting)
}else{
    //pull the orderlist of all the orders
    $orderList = $orders->getAll();
    //redirect to the all orders view
    require_once __DIR__ . '/view/all_orders.php';
}

?>