<?php 
//this page controller is used for the admin to edit the individual product information
//create session
session_start();
//checks if the user if not admin (admin is type 1)
if (!isset($_SESSION['type']) || !$_SESSION['type']===1) {
    //if not admin then make then login again
    header('Location: login.php');
    exit();
}
require_once __DIR__. '/model/products.php';
require_once __DIR__. '/util/error_handling.php';
//create new instance of products class
$products = new Products();
//if the delete button is set 
if (isset($_POST['delete'])) {
    //and the product id is set 
    if (isset($_POST['id'])) {
        //call to delete the product based on productID
        $product = $products->deleteProduct($_POST['id']);
        //if true then it ran successfully
        if ($product === true) {
            //redirect admin to edit products to see all of the products minus theone just deleted
            header('Location: edit_products.php');
            //exit
            exit();
        } else {
            //error handling
            handle_error("Invalid ID passed to delete request");
        }
    } else {
        //error handling
        handle_error("Invalid ID passed to delete request");
    }
}
//if edit is set then admin wants to edit a product
if(isset($_POST['edit'])){
    //if product id is set
    if(isset($_POST['id'])){
        //edit product is called and passed all of the product information
        //the input fields are automatically filled with the current information to make changes easier on user
        //no entry validation because every field is required before submisison
        $product = $products->editProduct($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['productImage'] );
        //if the function ran sucessfully
        if ($product === true) {
            //send admin to edit prodicts page to see all products and the new edits made to current product
            header('Location: edit_products.php');
            exit();
        } else {
            //error handling
            handle_error("something went wrong");
        }
    } else {
        //error handling
        handle_error("Invalid ID passed to delete request");
    }
}
//if just id is set 
if (isset($_GET['id'])) {
    //get the id
    $id = $_GET['id'];
    //returns information of product associated to the id
    $product = $products->getOne($_GET['id']);
} else {
    //sends user to the edit products page ot view all products
    header('Location: edit_products.php');
    exit();
}
//on default send admin to the product change page which only shows the product they clicked to edit
require_once __DIR__ . '/view/product_change.php';
?>