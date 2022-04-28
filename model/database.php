<?php
    require_once(__DIR__ . "/../util/error_handling.php");

    // Return an instance of the database
    function getDatabase() {
        try {
            // Try to access the database using PDO
            $db = new PDO("sqlite:" . __DIR__ . "/../panda.db");
        } catch(PDOException $e) {
            // If we can't access the database, display the error page
            handle_error($e->getMessage());
            exit();
        }
        return $db;
    }
    
?>