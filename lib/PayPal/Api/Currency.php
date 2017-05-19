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
 * @property string currency_code
 * @property string value
 */
class Currency extends PayPalModel
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
     * 3 letter currency code as defined by ISO 4217.
     *
     * @param string $currency
     * 
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->currency_code = $currency_code;
        return $this;
    }

    /**
     * 3 letter currency code as defined by ISO 4217.
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
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
        $value = FormatConverter::formatToPrice($value, (($this->getCurrency() != '') ? $this->getCurrency() : $this->getCurrencyCode()));
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
