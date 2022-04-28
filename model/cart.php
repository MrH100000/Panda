<?php
if(!session_id()){ 
    session_start(); 
} 
class Cart {
    // If the cart is empty, make sure the total cost / total items counters are set to 0
    public function __construct(){ 
        if (empty($_SESSION['cart_products'])) {
            $_SESSION['cart_products'] = array();
            $_SESSION['cart_products_total'] = 0;
            $_SESSION['cart_products_count'] = 0;
        } 
    }

    // Returns all items in the shopping cart (stored in the session)
    public function getAll(){ 
        $product_list = array_reverse($_SESSION['cart_products'], true); 
 
        return $product_list; 
    } 
    
    // Returns one item from the shopping cart (stored in the session)
    public function getOne($productId){
        if (isset($_SESSION['cart_products'][$productId])) {
            return $_SESSION['cart_products'][$productId];
        } else {
            return false;
        }
    }

    // Returns the subtotal (total cost of all items in cart not including tax/shipping)
    public function getTotalValue() {
        return $_SESSION['cart_products_total']; 
    }

    // Returns the total number of items in the cart
    public function getProductCount() {
        return $_SESSION['cart_products_count']; 
    }

    // Add a product to the cart
    public function add($product, $quantity) {
        // Increment the subtotal of the cart
        $_SESSION['cart_products_total'] += $product['Price'] * $quantity;
        $_SESSION['cart_products_count'] += $quantity;
        if (isset($_SESSION['cart_products'][$product['ProductID']])) {
            // If the product is already in the cart, increment the quantity instead of replacing it
            $_SESSION['cart_products'][$product['ProductID']]['quantity'] += $quantity;
        } else {
            // Create a new item in the cart
            $_SESSION['cart_products'][$product['ProductID']] = array('product' => $product, 'quantity' => $quantity);
        }
    }

    // Deletes an item from the cart in the session
    public function delete($productId) {
        if (isset($_SESSION['cart_products'][$productId])) {
            // Subtract the product from the subtotal of the cart
            $_SESSION['cart_products_total'] -= $_SESSION['cart_products'][$productId]['product']['Price'] * $_SESSION['cart_products'][$productId]['quantity'];
            // Subtract the number of items being deleted from the number of items in the cart
            $_SESSION['cart_products_count'] -= $_SESSION['cart_products'][$productId]['quantity'];
            unset($_SESSION['cart_products'][$productId]);
        } else {
            return false;
        }
    }

    // Remove all items from the cart
    public function clear(){ 
        $_SESSION['cart_products'] = array();
        $_SESSION['cart_products_total'] = 0;
        $_SESSION['cart_products_count'] = 0;
    } 
}
?>