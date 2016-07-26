<?php

namespace PayPal\Rest\Api;

use PayPal\Rest\Common\PayPalModel;

/**
 * Class Transactions
 *
 * 
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Rest\Api\Amount amount
 */
class Transactions extends PayPalModel
{
    /**
     * Amount being collected.
     * 
     *
     * @param \PayPal\Rest\Api\Amount $amount
     * 
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Amount being collected.
     *
     * @return \PayPal\Rest\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

}
