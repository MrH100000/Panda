<?php
session_start();
require_once __DIR__. '/model/users.php';
require_once __DIR__. '/model/cart.php';
$users = new users();
$cart=new Cart();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $users->getOneByUsernamePassword($username, $password);
    if ($user === false) {
        $error_message = "Username or password incorrect";
    } else {
        if (isset($_GET['next']) && $_GET['next'] == "checkout") {
            header('Location: checkout.php');
        } else {
            header('Location: index.php');
        }
        exit();
    }
}

if (isset($_GET['logout'])) {
    if(session_id()) {
        $user->clear();
        unset($user);
        $cart->clear();
    }
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/view/login.php';
?>