<?php 
    session_start();
    require_once __DIR__. '/model/users.php';
    $users = new users();
    //used to make sure function actually works
    $done="false";
    //makes sure everything is set from post
    if(isset($_POST['submit']))
    {
        //calls the createUser function 
        $done=$users->createUser($_POST['firstName'], $_POST['lastName'], $_POST['username'], $_POST['password'] );
        //if sucessfull then user is redirected to login
        if($done===true)
        {
            require_once __DIR__ . '/view/login.php';
            exit;
        }
        //if not then error message will show
        else
        {
            $error_message = "Username is already in use, please pick a new one";
        }
    }
    //sends user to register page 
    require_once __DIR__ . '/view/register_page.php';
?>