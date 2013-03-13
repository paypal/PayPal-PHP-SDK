<?php

namespace PayPal\Api;

/**
 * 
 */
class Item extends Resource {

    /**
     * Setter for name
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Getter for name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Setter for sku
     * @param string $sku
     */
    public function setSku($sku) {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Getter for sku
     */
    public function getSku() {
        return $this->sku;
    }

    /**
     * Setter for price
     * @param string $price
     */
    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    /**
     * Getter for price
     */
    public function getPrice() {
        return $this->price;
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
     * Setter for quantity
     * @param string $quantity
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Getter for quantity
     */
    public function getQuantity() {
        return $this->quantity;
    }

}