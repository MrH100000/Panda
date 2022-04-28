<?php
require_once(__DIR__ . "/database.php");
require_once(__DIR__ . "/Model.php");
class Products extends Model {
    static $db = null;
    //default constructor
    public function __construct() {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }
    //functionr returns all products and product info from the database
    //used to display all products on product page
    public function getAll() {
        try {
            //sql query to return all products records from database
            return $this->DB()->query("SELECT * FROM products order by productID")->fetchAll();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //get one returns the product information associated with a given id
    //used to display individual product page
    public function getOne($id) {
        try {
            //prepares sql statement to return all information from associated product id
            $query = $this->DB()->prepare('SELECT * FROM products WHERE ProductID = ?');
            $query->execute(array($id));
            return $query->fetch();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //delete product function will delete a product from the database by id
    //used by admin to delete products
    public function deleteProduct($id){
        try {
            //prepared sql statement to delete product information from database by id
            $query = $this->DB()->prepare('DELETE FROM products WHERE ProductID = ?');
            $query->execute(array($id));
            return true;
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //function to create a new product
    //used by admin to create a new product
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
    }
    //function for admin to edit products, parameters take all fields of product information
    //used for admin to edit products
    public function editProduct($id, $name, $description, $price, $productImage )
    {
        //prepare SQL query to see if the product is in the db
        $queryProd = $this->DB()->prepare('SELECT * FROM products WHERE productID = ?');
        $queryProd->execute(array($id));
        $productInfo= $queryProd->fetch();
        //if productInfo is not zero then the product is in the db
        if($productInfo>0)
        {
            //prepare sql statement to edit product, updates every column associated with the product id
            $query = $this->DB()->prepare('UPDATE products SET Name= :name, Description= :description, Price= :price, ProductImage =:productImage
                 WHERE productID = :id');
            //try to edit product
            try{
                //binds values while executing
                $query->execute([
                        ':name' => $name,
                        ':description' => $description,
                        ':price' => $price,
                        ':productImage' => $productImage,
                        ':id' => $id
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
    }
}
?>