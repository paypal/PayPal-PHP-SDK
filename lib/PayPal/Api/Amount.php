<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Amount
 *
 * @property string               currency
 * @property string               total
 * @property \PayPal\Api\Details  details
 */
class Amount extends PPModel
{
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
     * Set Total
     * Amount charged from the Payer account (or card) to Payee
     * In case of a refund, this is the refunded amount to the original Payer from Payee account
     *
     * @param string $total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get Total
     * Amount charged from the Payer account (or card) to Payee
     * In case of a refund, this is the refunded amount to the original Payer from Payee account
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set Details
     * Additional Details of Payment Amount
     *
     * @param \PayPal\Api\Details $details
     *
     * @return $this
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * Get Details
     * Additional Details of Payment Amount
     *
     * @return \PayPal\Api\Details
     */
    public function getDetails()
    {
        return $this->details;
    }
}
