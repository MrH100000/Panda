<?php
require_once("database.php");
require_once("Model.php");
class Products extends Model {
    static $db = null;

    public function __construct() {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }

    public function getAll() {
        try {
            return $this->DB()->query("SELECT * FROM products order by productID");
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function getOne($id) {
        try {
            $query = $this->DB()->prepare('SELECT * FROM products WHERE ProductID = ?');
            $query->execute(array($id));
            return $query->fetch();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    
}
?>