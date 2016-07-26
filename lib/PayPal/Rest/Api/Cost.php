<?php

namespace PayPal\Rest\Api;

use PayPal\Rest\Common\PayPalModel;
use PayPal\Rest\Converter\FormatConverter;
use PayPal\Rest\Validation\NumericValidator;

/**
 * Class Cost
 *
 * Cost as a percent. For example, 10% should be entered as 10. Alternatively, cost as an amount. For example, an amount of 5 should be entered as 5.
 *
 * @package PayPal\Api
 *
 * @property string percent
 * @property \PayPal\Rest\Api\Currency amount
 */
class Cost extends PayPalModel
{
    /**
     * Cost in percent. Range of 0 to 100.
     *
     * @param string $percent
     * 
     * @return $this
     */
    public function setPercent($percent)
    {
        NumericValidator::validate($percent, "Percent");
        $percent = FormatConverter::formatToNumber($percent);
        $this->percent = $percent;
        return $this;
    }

    /**
     * Cost in percent. Range of 0 to 100.
     *
     * @return string
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Cost in amount. Range of 0 to 999999.99.
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
     * Cost in amount. Range of 0 to 999999.99.
     *
     * @return \PayPal\Rest\Api\Currency
     */
    public function getAmount()
    {
        return $this->amount;
    }

}
