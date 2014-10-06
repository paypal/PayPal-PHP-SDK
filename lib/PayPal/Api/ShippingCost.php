<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class ShippingCost extends PPModel
{
    /**
     * Shipping cost in amount. Range of 0 to 999999.99.
     *
     * @param PayPal\Api\Currency $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Shipping cost in amount. Range of 0 to 999999.99.
     *
     * @return PayPal\Api\Currency
     */
    public function getAmount()
    {
        return $this->amount;
    }


    /**
     * Tax percentage on shipping amount.
     *
     * @param PayPal\Api\Tax $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Tax percentage on shipping amount.
     *
     * @return PayPal\Api\Tax
     */
    public function getTax()
    {
        return $this->tax;
    }


}
