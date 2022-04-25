<?php
// TODO: Store user login in session
require_once __DIR__. '/model/users.php';
$users = new users();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $users->getOneByUsernamePassword($_GET['username'], $_GET['password']);
    if ($user === false) {
        $error_message = "Username or password incorrect";
    } else {
    }
}
require_once __DIR__ . '/view/login.php';
?>