<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Common\FormatConverter;
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
class Currency extends PPModel
{
    /**
     * 3 letter currency code as defined by ISO 4217.
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
     * 3 letter currency code as defined by ISO 4217.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * amount up to N digit after the decimals separator as defined in ISO 4217 for the appropriate currency code.
     *
     * @param string|double $value
     * 
     * @return $this
     */
    public function setValue($value)
    {
        NumericValidator::validate($value, "Value");
        $value = FormatConverter::formatToTwoDecimalPlaces($value);
        $this->value = $value;
        return $this;
    }

    /**
     * amount up to N digit after the decimals separator as defined in ISO 4217 for the appropriate currency code.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

}
