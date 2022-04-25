<?php
// TODO: Store user login in session
require_once __DIR__. '/model/users.php';
$users = new users();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username=filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $user = $users->getOneByUsernamePassword($username, $password);
    if ($user === 4) {
        $error_message = "Username or password incorrect";
    } else {
        session_start();
        $_SESSION['username']=$username;
        require_once __DIR__ . '/view/home.php';
        exit;
    }
}
if(isset($_POST['logout']))
{
    $_SESSION['username']=null;
    $user=4;
}
require_once __DIR__ . '/view/login.php';
?>