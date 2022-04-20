<?php
function handle_error($error_msg) {
    $error_message = $error_msg;
    require_once(__DIR__ . "/../view/error.php");
    exit();
}
?>