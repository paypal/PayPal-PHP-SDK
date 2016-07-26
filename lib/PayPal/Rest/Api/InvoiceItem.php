<?php

namespace PayPal\Rest\Api;

use PayPal\Rest\Common\PayPalModel;
use PayPal\Rest\Converter\FormatConverter;
use PayPal\Rest\Validation\NumericValidator;

/**
 * Class InvoiceItem
 *
 * Information about a single line item.
 *
 * @package PayPal\Api
 *
 * @property string name
 * @property string description
 * @property \PayPal\Rest\Api\number quantity
 * @property \PayPal\Rest\Api\Currency unit_price
 * @property \PayPal\Rest\Api\Tax tax
 * @property string date
 * @property \PayPal\Rest\Api\Cost discount
 */
class InvoiceItem extends PayPalModel
{
    /**
     * Name of the item. 60 characters max.
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
     * 
     * @return $this
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
     * @param string|double $quantity
     * 
     * @return $this
     */
    public function setQuantity($quantity)
    {
        NumericValidator::validate($quantity, "Percent");
        $quantity = FormatConverter::formatToPrice($quantity);
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Quantity of the item. Range of 0 to 9999.999.
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Unit price of the item. Range of -999999.99 to 999999.99.
     *
     * @param \PayPal\Rest\Api\Currency $unit_price
     * 
     * @return $this
     */
    public function setUnitPrice($unit_price)
    {
        $this->unit_price = $unit_price;
        return $this;
    }

    /**
     * Unit price of the item. Range of -999999.99 to 999999.99.
     *
     * @return \PayPal\Rest\Api\Currency
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Tax associated with the item.
     *
     * @param \PayPal\Rest\Api\Tax $tax
     * 
     * @return $this
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Tax associated with the item.
     *
     * @return \PayPal\Rest\Api\Tax
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Date on which the item or service was provided. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $date
     * 
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Date on which the item or service was provided. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
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
     * @param \PayPal\Rest\Api\Cost $discount
     * 
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Item discount in percent or amount.
     *
     * @return \PayPal\Rest\Api\Cost
     */
    public function getDiscount()
    {
        return $this->discount;
    }

}
