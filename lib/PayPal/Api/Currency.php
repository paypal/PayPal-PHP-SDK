<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class Currency extends PPModel
{
    /**
     * 3 letter currency code
     *
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * 3 letter currency code
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }


    /**
     * amount upto 2 decimals represented as string
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * amount upto 2 decimals represented as string
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }


}
