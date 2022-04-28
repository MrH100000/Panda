<?php
session_start();
require_once __DIR__. '/model/users.php';
// Load the users model
$users = new Users();

// Verify that the username and password are present in the request
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Check if the user exists in the database
    $user = $users->getOneByUsernamePassword($username, $password);
    if ($user === false) {
        // If not, show an error message
        $error_message = "Username or password incorrect";
    } else {
        // Otherwise, if the user was attempting to checkout, redirect back to the checkout page
        if (isset($_GET['next']) && $_GET['next'] == "checkout") {
            header('Location: checkout.php');
        // Otherwise, just go to the homepage
        } else {
            header('Location: index.php');
        }
        exit();
    }
}

// If the logout option is set
if (isset($_GET['logout'])) {
    // If the user is logged in
    if(session_id()) {
        // Clear the session
        $users->clear();
        unset($user);
    }
    // And redirect to the homepage
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/view/login.php';
?>