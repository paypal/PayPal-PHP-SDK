<?php

namespace PayPal\Api;

/**
 * 
 */
class Amount extends Resource {

    /**
     * Setter for total
     * @param string $total
     */
    public function setTotal($total) {
        $this->total = $total;
        return $this;
    }

    /**
     * Getter for total
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * Setter for currency
     * @param string $currency
     */
    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Getter for currency
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * Setter for details
     * @param PayPal\Api\AmountDetails $details
     */
    public function setDetails($details) {
        $this->details = $details;
        return $this;
    }

    /**
     * Getter for details
     */
    public function getDetails() {
        return $this->details;
    }

}