<?php 
//don't be fooled by my inconsistent file naming- this only shows the products and the edit button, doesn't actually allow product editting

    //session start 
    session_start();
    //if the user type is not set or the user is not an admin (admin is type 1)
    if (!isset($_SESSION['type']) || $_SESSION['type'] !== 1) {
        //they will ne directed to login again as admin
        header('Location: login.php');
        exit();
    }
    require_once __DIR__. '/model/products.php';
    //create instance of product class
    $products = new Products();
    //get all of the products in the database and return to productList
    $productList = $products->getAll();
    //if the submit button is pressed on login page
    if(isset($_POST['submit']))
    {
        //call to add product to the database 
        //no we do not check if they are set because they are set as required to submit in the view
        $done=$products->createProduct($_POST['name'], $_POST['description'], $_POST['price'], $_POST['image']);
        //if the function runs correctly
        if($done===true)
        {
            //redirect admin to edit products page to view all products and the new product
            header('location: edit_products.php');
            //unset the submit button
            $_POST['submit']=false;
            exit;
        }
        //if not then error message will show
        else
        {
            $error_message = "Product is already created. Please add a new product";
        }
    }
    //by default send the user to the edit product page if they are an admin
    require_once __DIR__ . '/view/edit_product.php'; 
?>