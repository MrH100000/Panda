<?php
class OrderCalculator {
    private $subtotal;
    protected $SHIPPING_FEE = 10000;
    protected $TAX_RATE = 0.1;

    public function __construct($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function calcOrderShipping() {
        return $this->SHIPPING_FEE;
    }

    public function calcOrderTax() {
        return $this->TAX_RATE * $this->subtotal;
    }

    public function calcOrderTotal() {
        return ($this->calcOrderTax() + $this->subtotal) + $this->calcOrderShipping();
    }
}
?>