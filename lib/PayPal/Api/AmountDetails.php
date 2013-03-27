<?php

namespace PayPal\Api;

/**
 * 
 */
class AmountDetails extends Resource {

    /**
     * Setter for subtotal
     * @param string $subtotal
     */
    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * Getter for subtotal
     */
    public function getSubtotal() {
        return $this->subtotal;
    }

    /**
     * Setter for tax
     * @param string $tax
     */
    public function setTax($tax) {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Getter for tax
     */
    public function getTax() {
        return $this->tax;
    }

    /**
     * Setter for shipping
     * @param string $shipping
     */
    public function setShipping($shipping) {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Getter for shipping
     */
    public function getShipping() {
        return $this->shipping;
    }

    /**
     * Setter for fee
     * @param string $fee
     */
    public function setFee($fee) {
        $this->fee = $fee;
        return $this;
    }

    /**
     * Getter for fee
     */
    public function getFee() {
        return $this->fee;
    }

}