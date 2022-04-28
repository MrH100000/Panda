<?php
require_once(__DIR__ . "/database.php");
require_once(__DIR__ . "/Model.php");
class Orders extends Model {
    static $db = null;
    public function __construct() {
        if (static::$db === null) {
            static::$db = getDatabase();
        }
    }
    //addToOrder function is used to add customer information to the orders database upon checkout
    public function addOrder($street, $city, $state, $zipCode, $country, $paymentType, $total, $shipping, $taxes, $subtotal) {
        //gets user id
        $id=$_SESSION['userID'];
        //current date and time
        $date=date("F j, Y, g:i a");
        //prepared SQL query to input all necessary information into the order table
        $query = $this->DB()->prepare('INSERT INTO orders (UserID, Address, City, State, Country, ZipCode, PaymentType, Date, Total, ShippingCost, Tax, Subtotal)
        VALUES ( :id, :street, :city, :state , :country, :zipCode, :paymentType, :date, :total, :shipping, :taxes, :subtotal)');
        //try to add order
        try {
            //binds values while executing
            $query->execute([
                    ':id' => $id,
                    ':street' => $street,
                    ':state' => $state,
                    ':city' => $city,
                    ':country' => $country,
                    ':zipCode' => $zipCode,
                    ':paymentType' => $paymentType,
                    ':date' => $date,
                    ':total' => $total,
                    ':shipping' => $shipping,
                    ':taxes' => $taxes,
                    ':subtotal' => $subtotal
            ]);
            //returns true
            return true;
        //if it doesnt work, display error
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //get last order id is used to return the order ID of the most recent order placed
    public function getLastOrderID()
    {
        //prepared sql query to return the last orderID
        $query=$this->DB()->prepare('SELECT OrderID FROM orders ORDER BY OrderID DESC LIMIT 1');
        $query->execute();
        //returns ID to be used by other functions
        return $query->fetch()['OrderID'];
    }
    //get order by ID is used to return all information associated to the given orderID
    public function getOrderByID($id){
        //try to prep and execute the sql statement
        try {
            //prepare sql query to return information from orders table by orderID
            $query = $this->DB()->prepare('SELECT * FROM orders WHERE OrderID = ?');
            $query->execute(array($id));
            //returns the order information
            return $query->fetch();
        //displays error if it doesn't work
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //add to order_product adds an order to the order_product table which 
    //ties every productID to the order they are ordered in 
    public function addToOrder_Product($cartList, $orderID)
    {
        //for every product ordered in the checkout process
        foreach($cartList as $cartItem)
        {
            //grab the product ID
            $productID=$cartItem['product']['ProductID'];
            //and quantity
            $quantity=$cartItem['quantity'];
            //prepare sql statement to insert ProductID, Quantity, and OrderID into the database
            $query = $this->DB()->prepare('INSERT INTO order_products (OrderID, ProductID, Quantity)
            VALUES ( :orderID, :productID, :quantity)');
            try {
                //binds values while executing
                $query->execute([
                        ':orderID' => $orderID,
                        ':productID' => $productID,
                        ':quantity' => $quantity
                ]);
            //if it doesnt work, display error
            } catch(PDOException $e) {
                handle_error($e->getMessage());
            }
        }
        return true;
    }
    //delete order is used by the admin to delete an order from the database
    public function deleteOrder($id){
        try {
            //prepare sql statement to delete the order fromt he order table by ID
            $query = $this->DB()->prepare('DELETE FROM orders WHERE OrderID = ?');
            //executes
            $query->execute(array($id));
            //then also delete every entry in the order_product table with that orderID
            $query = $this->DB()->prepare('DELETE FROM order_products WHERE OrderID = ?');
            $query->execute(array($id));
            return true;
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //this function is used to search the orders by product id
    public function searchByProduct($id)
    {
        //try to do 
        try {
            //prepared sql query to search for every order with the product ID by searching the order_products table
            $query=$this->DB()->prepare('SELECT orders.*, users.username as Username FROM orders, order_products, users WHERE orders.OrderID = order_products.OrderID AND users.UserID = orders.UserID AND order_products.ProductID = ? ORDER BY OrderID');
            $query-> execute(array($id));
            //returns all of the orders associated with the productID
            return $query->fetchAll();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }
    //search by username is used to search the database for orders associated iwth a given username
    public function searchByUsername($username)
    {
            //prepare sql query to search for the userID associated with the given username
            $query=$this->DB()->prepare('SELECT UserID FROM users WHERE Username = ?');
            $query-> execute(array($username));
            $id=$query->fetch();
            //if the is is true then there is an ID associated with that username
            if($id !== false)
            {
                try {
                        //prepare sql query to search the orders table for any orders the user ordered
                        $query=$this->DB()->prepare('SELECT orders.*, users.username as Username FROM orders, users WHERE users.UserID = ? and orders.UserID = users.UserID order by orderID');
                        $query-> execute(array($id['UserID']));
                        return $query->fetchAll();            
                } catch(PDOException $e) {
                    handle_error($e->getMessage());
                }
            }
            else
            {
                return false;
            }
    }
    //get all returns all of the order information from every order made from the database
    public function getAll() {
        try {
            //returns the order information from the database
            return $this->DB()->query("SELECT orders.*, users.username as Username FROM orders, users WHERE orders.UserID = users.UserID order by Date DESC")->fetchAll();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

}
?>