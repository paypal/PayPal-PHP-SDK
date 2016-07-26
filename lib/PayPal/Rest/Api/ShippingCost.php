<?php

namespace PayPal\Rest\Api;

use PayPal\Rest\Common\PayPalModel;

/**
 * Class ShippingCost
 *
 * Shipping cost in percent or amount.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Rest\Api\Currency amount
 * @property \PayPal\Rest\Api\Tax tax
 */
class ShippingCost extends PayPalModel
{
    /**
     * Shipping cost in amount. Range of 0 to 999999.99.
     *
     * @param \PayPal\Rest\Api\Currency $amount
     * 
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Shipping cost in amount. Range of 0 to 999999.99.
     *
     * @return \PayPal\Rest\Api\Currency
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Tax percentage on shipping amount.
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
     * Tax percentage on shipping amount.
     *
     * @return \PayPal\Rest\Api\Tax
     */
    public function getTax()
    {
        return $this->tax;
    }

}
