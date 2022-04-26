<?php
require_once("database.php");
require_once("Model.php");
class Orders extends Model {
    static $db = null;

    public function __construct() {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }
    public function addToOrder($street, $city, $state, $zipCode, $country, $paymentType )
    {
        //prepare sql statement to add to cart
        $id=$_SESSION['userID'];
        $query = $this->DB()->prepare('INSERT INTO orders (UserID, Address, City, State, Country, ShippingCost, ZipCode, PaymentType)
        VALUES ( :id, :street, :city, :state , :country, 10000, :zipCode, :paymentType)');
        //try to add product
        try{
            //binds values while executing
            $query->execute([
                    ':id' => $id,
                    ':street' => $street,
                    ':state' => $state,
                    ':city' => $city,
                    ':country' => $country,
                    ':zipCode' => $zipCode,
                    ':paymentType' => $paymentType
            ]);
            //close query
            $query->closeCursor();
            return true;
        //if it doesnt work, display error
        }catch(PDOException $e) {
            handle_error($e->getMessage());
            exit();
        }
        $query->closeCursor();
    }

    public function deleteOrder($id){
        try {
            $query = $this->DB()->prepare('DELETE FROM orders WHERE OrderID = ?');
            $query->execute(array($id));
            return true;
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function searchByProduct($id)
    {
        try {
            $query=$this->DB()->prepare('SELECT * FROM orders WHERE productID= ? order by orderID');
            $query-> execute(array($id));
            return $query->fetchAll();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function searchByUsername($id)
    {
        try {
            $query=$this->DB()->prepare('SELECT * FROM orders WHERE userID= ? order by orderID');
            $query-> execute(array($id));
            return $query->fetchAll();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

}
?>