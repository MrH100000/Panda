<?php
class OrderCalculator {
    private $subtotal;
    protected $SHIPPING_RATE = 0.15;
    protected $TAX_RATE = 0.1;

    public function __construct($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function calcOrderShipping() {
        return $this->SHIPPING_RATE * $this->subtotal;
    }

    public function calcOrderTax() {
        return $this->TAX_RATE * $this->subtotal;
    }

    public function calcOrderTotal() {
        return ($this->calcOrderTax() + $this->subtotal) + $this->calcOrderShipping();
    }
}
?>