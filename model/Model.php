<?php
require_once(__DIR__ . "/database.php");

abstract class Model {
    static $db = null;

    public function __construct($table_name) {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }

    protected function DB(): PDO {
        return static::$db;
    }

}
?>