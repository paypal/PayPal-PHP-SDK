<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class InvoiceItem extends PPModel
{
    /**
     * Name of the item. 60 characters max.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Name of the item. 60 characters max.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Description of the item. 1000 characters max.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Description of the item. 1000 characters max.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Quantity of the item. Range of 0 to 9999.999.
     *
     * @param PayPal\Api\number $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Quantity of the item. Range of 0 to 9999.999.
     *
     * @return PayPal\Api\number
     */
    public function getQuantity()
    {
        return $this->quantity;
    }


    /**
     * Unit price of the item. Range of -999999.99 to 999999.99.
     *
     * @param PayPal\Api\Currency $unit_price
     */
    public function setUnitPrice($unit_price)
    {
        $this->unit_price = $unit_price;
        return $this;
    }

    /**
     * Unit price of the item. Range of -999999.99 to 999999.99.
     *
     * @return PayPal\Api\Currency
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Unit price of the item. Range of -999999.99 to 999999.99.
     *
     * @param PayPal\Api\Currency $unit_price
     * @deprecated. Instead use setUnitPrice
     */
    public function setUnit_price($unit_price)
    {
        $this->unit_price = $unit_price;
        return $this;
    }

    /**
     * Unit price of the item. Range of -999999.99 to 999999.99.
     *
     * @return PayPal\Api\Currency
     * @deprecated. Instead use getUnitPrice
     */
    public function getUnit_price()
    {
        return $this->unit_price;
    }

    /**
     * Tax associated with the item.
     *
     * @param PayPal\Api\Tax $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Tax associated with the item.
     *
     * @return PayPal\Api\Tax
     */
    public function getTax()
    {
        return $this->tax;
    }


    /**
     * Date on which the item or service was provided. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST.
     *
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Date on which the item or service was provided. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Item discount in percent or amount.
     *
     * @param PayPal\Api\Cost $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Item discount in percent or amount.
     *
     * @return PayPal\Api\Cost
     */
    public function getDiscount()
    {
        return $this->discount;
    }


}
