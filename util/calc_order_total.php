<?php
class OrderCalculator {
    private $subtotal;
    protected $SHIPPING_RATE = 0.15;
    protected $TAX_RATE = 0.1;

    // This class calculates different values based on the subtotal provided in the constructor here
    public function __construct($subtotal) {
        $this->subtotal = $subtotal;
    }

    // Return the shipping cost for a given subtotal (Shipping rate * Subtotal)
    public function calcOrderShipping() {
        return $this->SHIPPING_RATE * $this->subtotal;
    }

    // Return the tax for a given subtotal (Tax rate * Subtotal)
    public function calcOrderTax() {
        return $this->TAX_RATE * $this->subtotal;
    }

    // Return the order total (sum of the subtotal plus the shipping fee, plus the tax)
    public function calcOrderTotal() {
        return ($this->calcOrderTax() + $this->subtotal) + $this->calcOrderShipping();
    }
}
?>