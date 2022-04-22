<?php 
    require_once("database.php");
    $pull= filter_input(INPUT_POST, 'pull');
    $queryProducts="SELECT * FROM products order by productID";
    $statement= $db ->prepare($queryProducts);
    $statement -> execute();
    $productList=$statement -> fetchAll();
    $statement ->closeCursor();
?>