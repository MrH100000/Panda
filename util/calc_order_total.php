<?php
class OrderCalculator {
    private $subtotal;
    protected $SMALL_SHIPPING_FEE = 25;
    protected $LARGE_SHIPPING_FEE = 10000;
    protected $TAX_RATE = 0.1;

    public function __construct($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function calcOrderShipping() {
        if ($this->subtotal > 10000) {
            return $this->LARGE_SHIPPING_FEE;
        } else {
            return $this->SMALL_SHIPPING_FEE;
        }
    }

    public function calcOrderTax() {
        return $this->TAX_RATE * $this->subtotal;
    }

    public function calcOrderTotal() {
        return ($this->calcOrderTax() + $this->subtotal) + $this->calcOrderShipping();
    }
}
?>