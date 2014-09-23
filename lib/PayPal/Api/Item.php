<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Item
 *
 * @property string quantity
 * @property string name
 * @property string price
 * @property string currency
 * @property string sku
 * @property string description
 * @property string tax
 */
class Item extends PPModel
{
    /**
     * Set Quantity
     * Number of items
     *
     * @param string $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get Quantity
     * Number of items
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set Name
     * Name of the item
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Name
     * Name of the item
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Price
     * Cost of the item
     *
     * @param string $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get Price
     * Cost of the item
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set Currency
     * Three Letter Currency Code
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get Currency
     * Three Letter Currency Code
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set SKU
     * Number or code to identify the item in your catalog/records
     *
     * @param string $sku
     *
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get SKU
     * Number or code to identify the item in your catalog/records
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set Description
     * Description of the item
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get Description
     * Description of the item
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set Tax
     * Tax of the item
     *
     * @param string $tax
     *
     * @return $this
     */
    public function setTax($tax) {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get Tax
     * Tax of the item
     *
     * @return string
     */
    public function getTax() {
        return $this->tax;
    }
}
