<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Converter\FormatConverter;
use PayPal\Validation\NumericValidator;

/**
 * Class Currency
 *
 * Base object for all financial value related fields (balance, payment due, etc.)
 *
 * @package PayPal\Api
 *
 * @property string currency
 * @property string value
 */
class Currency extends PayPalModel
{
    /**
     * 3 letter currency code
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
     * @param string|double $value
     * 
     * @return $this
     */
    public function setValue($value)
    {
        NumericValidator::validate($value, "Value");
        $value = FormatConverter::formatToPrice($value, $this->getCurrency());
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
