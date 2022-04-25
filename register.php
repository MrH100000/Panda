<?php 
    session_start();
    require_once __DIR__. '/model/users.php';
    $users = new users();
    //used to make sure function actually works
    $done="false";
    //makes sure everything is set from post
    if(isset($_POST['firstName']) && isset($_POST['lastName'])
        && isset($_POST['username']) && isset($_POST['password']))
    {
        //grabs all input information from the post request
        $firstName=filter_input(INPUT_POST, 'firstName');
        $lastName=filter_input(INPUT_POST, 'lastName');
        $username=filter_input(INPUT_POST, 'username');
        $password=filter_input(INPUT_POST, 'password');
        //calls the createUser function 
        $done=$users->createUser($firstName, $lastName, $username, $password );
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
    require_once __DIR__ . '/view/registerPage.php';
?>