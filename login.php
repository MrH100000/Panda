<?php
session_start();
require_once __DIR__. '/model/users.php';
$users = new users();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username=filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $user = $users->getOneByUsernamePassword($username, $password);
    if ($user === false) {
        $error_message = "Username or password incorrect";
    } else {
        require_once __DIR__ . '/view/home.php';
        exit;
    }
}
if(isset($_POST['logout']))
{
    if(isset($_SESSION))
    {
        $_SESSION['username']=null;
        $_SESSION['loggedIn']=false;
        $_SESSION['type']=null;
        $_SESSION['firstName']=null;
        $user=false;
        session_destroy();
    }
    
}
require_once __DIR__ . '/view/login.php';
?>