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
    
    public function addOrder($street, $city, $state, $zipCode, $country, $paymentType, $total, $shipping, $taxes, $subtotal) {
        $id=$_SESSION['userID'];
        $username=$_SESSION['username'];
        $date=date("F j, Y, g:i a");
        $query = $this->DB()->prepare('INSERT INTO orders (UserID, Address, City, State, Country, ZipCode, PaymentType, Date, Total, ShippingCost, Tax, Subtotal, Username)
        VALUES ( :id, :street, :city, :state , :country, :zipCode, :paymentType, :date, :total, :shipping, :taxes, :subtotal, :username)');
        //try to add product
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
                    ':subtotal' => $subtotal,
                    ':username' => $username
            ]);
            return true;
        //if it doesnt work, display error
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function getLastOrderID()
    {
        $query=$this->DB()->prepare('SELECT OrderID FROM orders ORDER BY OrderID DESC LIMIT 1');
        $query->execute();
        return $query->fetch()['OrderID'];
    }

    public function getOrderByID($id){
        try {
            $query = $this->DB()->prepare('SELECT * FROM orders WHERE OrderID = ?');
            $query->execute(array($id));
            return $query->fetch();
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function addToOrder_Product($cartList, $orderID)
    {
        foreach($cartList as $cartItem)
        {
            $productID=$cartItem['product']['ProductID'];
            $quantity=$cartItem['quantity'];
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

    public function deleteOrder($id){
        try {
            $query = $this->DB()->prepare('DELETE FROM orders WHERE OrderID = ?');
            $query->execute(array($id));
            $query = $this->DB()->prepare('DELETE FROM order_products WHERE OrderID = ?');
            $query->execute(array($id));
            return true;
        } catch(PDOException $e) {
            handle_error($e->getMessage());
        }
    }

    public function searchByProduct($id)
    {
        try {
            $query=$this->DB()->prepare('SELECT * FROM orders, order_products WHERE orders.OrderID = order_products.OrderID AND order_products.ProductID = ? ORDER BY OrderID');
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