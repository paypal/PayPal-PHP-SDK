<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Converter\FormatConverter;
use PayPal\Validation\NumericValidator;

/**
 * Class ReportingTransactionAmount
 *
 * payment amount model used by reporting transactions.
 *
 * @package PayPal\Api
 *
 * @property string currency_code
 * @property string value
 */
class ReportingTransactionAmount extends PayPalModel
{
    /**
     * 3-letter [currency code](https://developer.paypal.com/docs/integration/direct/rest_api_payment_country_currency_support/). PayPal does not support all currencies.
     *
     * @param string $currency_code
     *
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->currencyCode = $currency_code;
        return $this;
    }

    /**
     * 3-letter [currency code](https://developer.paypal.com/docs/integration/direct/rest_api_payment_country_currency_support/). PayPal does not support all currencies.
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set amount value. Format it using currency converter.
     *
     * @param string|double $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        NumericValidator::validate($value, "Total");
        $value = FormatConverter::formatToPrice($value, $this->getCurrencyCode());
        $this->value = $value;
        return $this;
    }

    /**
     * Get amount value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
