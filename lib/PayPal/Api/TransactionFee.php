<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Converter\FormatConverter;
use PayPal\Validation\NumericValidator;

/**
 * Class TranactionFee
 *
 * Let's you specify details of the transaction fee.
 *
 * @package PayPal\Api
 *
 * @property string currency
 * @property string value
 */
class TransactionFee extends PayPalModel
{
    /**
     * 3 letter currency code
     *
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
     * Total amount charged from the Payer account (or card) to Payee. In case of a refund, this is the refunded amount to the original Payer from Payee account.
     *
     *
     * @param string|double $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        NumericValidator::validate($value, "value");
        $value = FormatConverter::formatToPrice($value, $this->getCurrency());
        $this->value = $value;
        return $this;
    }

    /**
     * Value amount charged from the Payer account (or card) to Payee. In case of a refund, this is the refunded amount to the original Payer from Payee account.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
