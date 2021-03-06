<?php
require_once("database.php");
require_once("Model.php");
class Users extends Model {
    static $db = null;
    //default ocnstructor
    public function __construct() {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }
    //function to get all of the users in the database
    public function getAll() {
        try {
            return $this->DB()->query("SELECT * FROM users order by UserID")->fetchAll();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //function to search for one user by ID, because why not
    public function getOne($id) {
        try {
            $query = $this->DB()->prepare('SELECT * FROM users WHERE UserID = ?');
            $query->execute(array($id));
            return $query->fetch();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //function to query for user with username and password
    //used fo users to login
    public function getOneByUsernamePassword($username, $password) {
        try {
            //sql query to select user with given username and password
            $query = $this->DB()->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
            $query->execute(array($username, $password));
            $userInfo= $query->fetch();
            //if a user is returned then there is a user with matching username and password
            if($userInfo >= 1)
            {
                //fill session info with user info
                $_SESSION['username']=$username;
                $_SESSION['loggedIn']=true;
                $_SESSION['firstName']=$userInfo['FirstName'];
                $_SESSION['lastName']=$userInfo['LastName'];
                $_SESSION['userID']=$userInfo['UserID'];
                //if user is admin they are given type of 1
                if($userInfo['IsAdmin']===1)
                {
                    $_SESSION['type']=1;
                }
                //if user not admin then type 2
                elseif($userInfo['IsAdmin']===0)
                {
                    $_SESSION['type']=2;
                }
                return true;
            }
            //return false if no username and password match
            return false;
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //function to create user given their name, username, and password
    //used for customers to register for an account
    public function createUser($firstName, $lastName, $username, $password )
    {
        //every new user will automatically not be an admin
        $isAdmin=0;
        //prepare SQL query to see if the username is already used
        $queryUser = $this->DB()->prepare('SELECT * FROM users WHERE username = ?');
        $queryUser->execute(array($username));
        $userInfo= $queryUser->fetch();
        //if userInfo is not zero then the username is in use already
        if($userInfo<1)
        {
            //prepare sql statement to add user
            $query = $this->DB()->prepare('INSERT INTO users (FirstName, LastName, IsAdmin, username, password)
            VALUES( :firstName, :lastName, :isAdmin , :username, :password)');
            //try to add user
            try{
                //binds values while executing
                $query->execute([
                        ':firstName' => $firstName,
                        ':lastName' => $lastName,
                        ':isAdmin' => $isAdmin,
                        ':username' => $username,
                        ':password' => $password
                ]);
                //close query
                $query->closeCursor();
                //return true because user is created
                //type 5 means new user
                $_SESSION['type']=5;
                return true;
            //if it doesnt work, display error
            }catch(PDOException $e) {
                handle_error($e->getMessage());
                exit();
            }
            $queryUser->closeCursor();
        }
        //if username already used return false to show error message
        else
        {
            return false;
        }
        return false;
    }
    //clear is used to unset everything in the session when a user pressed the logout button
    public function clear()
    {
        unset($_SESSION['username']);
        unset($_SESSION['loggedIn']);
        unset($_SESSION['type']);
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['userID']);
    }
}
?>