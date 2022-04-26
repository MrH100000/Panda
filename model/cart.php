<?php
if(!session_id()){ 
    session_start(); 
} 
class Cart {      
    public function __construct(){ 
        if (empty($_SESSION['cart_products'])) {
            $_SESSION['cart_products'] = array();
            $_SESSION['cart_products_total'] = 0;
            $_SESSION['cart_products_count'] = 0;
        } 
    }

    public function getAll(){ 
        $product_list = array_reverse($_SESSION['cart_products'], true); 
 
        return $product_list; 
    } 
    
    public function getOne($productId){
        if (isset($_SESSION['cart_products'][$productId])) {
            return $_SESSION['cart_products'][$productId];
        } else {
            return false;
        }
    }

    public function getTotalValue() {
        return $_SESSION['cart_products_total']; 
    }

    public function getProductCount() {
        return $_SESSION['cart_products_count']; 
    }

    public function add($product, $quantity) {
        $_SESSION['cart_products_total'] += $product['Price'];
        $_SESSION['cart_products_count'] += $quantity;
        if (isset($_SESSION['cart_products'][$product['ProductID']])) {
            $_SESSION['cart_products'][$product['ProductID']]['quantity'] += $quantity;
        } else {
            $_SESSION['cart_products'][$product['ProductID']] = array('product' => $product, 'quantity' => $quantity);
        }
    }

    public function remove($productId) {
        unset($_SESSION['cart_products'][$productId]);
    }

    public function destroy(){ 
        unset($_SESSION['cart_products']); 
    } 
}
?>