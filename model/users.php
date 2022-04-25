<?php
require_once("database.php");
require_once("Model.php");
class Users extends Model {
    static $db = null;

    public function __construct() {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }

    public function getAll() {
        try {
            return $this->DB()->query("SELECT * FROM users order by UserID")->fetchAll();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function getOne($id) {
        try {
            $query = $this->DB()->prepare('SELECT * FROM users WHERE UserID = ?');
            $query->execute(array($id));
            return $query->fetch();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function getOneByUsernamePassword($username, $password) {
        try {
            $query = $this->DB()->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
            $query->execute(array($username, $password));
            $userInfo= $query->fetch();
            $type=4;
            if($userInfo >= 1)
            {
                if($userInfo['IsAdmin']==1)
                {
                    $type=1;
                }
                elseif($userInfo['IsAdmin']==0)
                {
                    $type=2;
                }
            }
            return $type;
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
}
?>