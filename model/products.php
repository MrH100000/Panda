<?php 
    // require_once("database.php");
    // $pull= filter_input(INPUT_POST, 'pull', FILTER_SANITIZE_SPECIAL_CHARS);
    // $queryProducts="SELECT * FROM products order by productID";
    // $statement= $db ->prepare($queryProducts);
    // $statement -> execute();
    // $productList=$statement -> fetchAll();
    // $statement ->closeCursor();
?>
<?php
require_once("database.php");
require_once("Model.php");
class Products extends Model {
    static $db = null;

    public function __construct() {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
        // $this->lastNameSearchQuery = $db->prepare('SELECT * FROM students WHERE LastName LIKE ?');
        // $this->favoritePandaSearchQuery = $db->prepare('SELECT * FROM students WHERE FavoritePandaType LIKE ?');
        // $this->idGreatherThanQuery = $db->prepare('SELECT * FROM students WHERE ID > ?');
        // $this->newStudentQuery = $db->prepare('INSERT INTO STUDENTS (firstname, lastname, age, favoritepandatype) VALUES (?, ?, ?, ?)');
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

    // public function new($firstName, $lastName, $Age, $favoritePanda) {
    //     try {
    //         return $this->newStudentQuery->execute(array($firstName, $lastName, $Age, $favoritePanda));
    //     } catch(PDOException $e) {
    //         handle_error($e->getMessage());
    //     }
    // }
    
}
?>