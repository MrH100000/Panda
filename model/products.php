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
            return $this->DB()->query("SELECT * FROM products order by productID")->fetchAll();
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
    public function deleteProduct($id){
        try {
            $query = $this->DB()->prepare('DELETE FROM products WHERE ProductID = ?');
            $query->execute(array($id));
            return true;
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //function to create a new product
    public function createProduct($name, $description, $price, $productImage )
    {
        //prepare SQL query to see if the product is already in the db
        $queryProd = $this->DB()->prepare('SELECT * FROM products WHERE name = ?');
        $queryProd->execute(array($name));
        $productInfo= $queryProd->fetch();
        //if productInfo is not zero then the product is in the db already
        if($productInfo<1)
        {
            //prepare sql statement to add product
            $query = $this->DB()->prepare('INSERT INTO products (Name, Description, Price, ProductImage)
            VALUES ( :name, :description, :price , :productImage)');
            //try to add product
            try{
                //binds values while executing
                $query->execute([
                        ':name' => $name,
                        ':description' => $description,
                        ':price' => $price,
                        ':productImage' => $productImage
                ]);
                //close query
                $query->closeCursor();
                return true;
            //if it doesnt work, display error
            }catch(PDOException $e) {
                handle_error($e->getMessage());
                exit();
            }
            $queryProd->closeCursor();
        }
        //if product already used return false to show error message
        else
        {
            return false;
        }
        return false;
    }
}
?>