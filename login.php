<?php
session_start();
require_once __DIR__. '/model/users.php';
$users = new users();
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
        unset($_SESSION['username']);
        unset($_SESSION['loggedIn']);
        unset($_SESSION['type']);
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['userID']);
        unset($user);
    }
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/view/login.php';
?>