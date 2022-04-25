<?php
    require_once(__DIR__ . "/../util/error_handling.php");
    function getDatabase() {
        try {
            $db = new PDO("sqlite:" . __DIR__ . "/../panda.db");
        } catch(PDOException $e) {
            handle_error($e->getMessage());
            exit();
        }
        return $db;
    }
?>