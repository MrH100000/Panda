<?php
require_once(__DIR__ . "/database.php");


// Basis for other models that interact with the database
abstract class Model {
    static $db = null;

    public function __construct($table_name) {
        // Make sure we have a reference to an instance of the database
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }

    protected function DB(): PDO {
        // Return the instance of the database
        return static::$db;
    }

}
?>