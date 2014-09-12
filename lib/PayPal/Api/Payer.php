<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Payer
 *
 * @property string                              payment_method
 * @property array|\PayPal\Api\FundingInstrument funding_instruments
 * @property \PayPal\Api\PayerInfo               payer_info
 */
class Payer extends PPModel
{
    /**
     * Set Payment Method
     * Payment method being used - PayPal Wallet payment or Direct Credit card
     *
     * @param string $payment_method
     *
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    /**
     * Get Payment Method
     * Payment method being used - PayPal Wallet payment or Direct Credit card
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Set Payment Method
     * Payment method being used - PayPal Wallet payment or Direct Credit card
     *
     * @param string $payment_method
     *
     * @deprecated Use setPaymentMethod
     *
     * @return $this
     */
    public function setPayment_method($payment_method)
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    /**
     * Get Payment Method
     * Payment method being used - PayPal Wallet payment or Direct Credit card
     *
     * @deprecated Use getPaymentMethod
     *
     * @return string
     */
    public function getPayment_method()
    {
        return $this->payment_method;
    }

    /**
     * Set Funding Instruments
     * List of funding instruments from where the funds of the current payment come from. Typically a credit card
     *
     * @param \PayPal\Api\FundingInstrument|array $funding_instruments
     *
     * @return $this
     */
    public function setFundingInstruments($funding_instruments)
    {
        $this->funding_instruments = $funding_instruments;

        return $this;
    }

    /**
     * Get Funding Instruments
     *
     * @return \PayPal\Api\FundingInstrument|array
     */
    public function getFundingInstruments()
    {
        return $this->funding_instruments;
    }

    /**
     * Set Funding Instruments
     * List of funding instruments from where the funds of the current payment come from. Typically a credit card
     *
     * @param \PayPal\Api\FundingInstrument $funding_instruments
     *
     * @deprecated Use setFundingInstruments
     *
     * @return $this
     */
    public function setFunding_instruments($funding_instruments)
    {
        $this->funding_instruments = $funding_instruments;

        return $this;
    }

    /**
     * Get Funding Instruments
     *
     * @deprecated Use getFundingInstruments
     *
     * @return \PayPal\Api\FundingInstrument
     */
    public function getFunding_instruments()
    {
        return $this->funding_instruments;
    }

    /**
     * Set Payer Info
     * Information related to the Payer
     * In case of PayPal Wallet payment, this information will be filled in by PayPal after the user approves the payment using their PayPal Wallet
     *
     * @param \PayPal\Api\PayerInfo $payer_info
     *
     * @return $this
     */
    public function setPayerInfo($payer_info)
    {
        $this->payer_info = $payer_info;

        return $this;
    }

    /**
     * Get Payer Info
     *
     * @return \PayPal\Api\PayerInfo
     */
    public function getPayerInfo()
    {
        return $this->payer_info;
    }

    /**
     * Set Payer Info
     * Information related to the Payer
     * In case of PayPal Wallet payment, this information will be filled in by PayPal after the user approves the payment using their PayPal Wallet
     *
     * @param \PayPal\Api\PayerInfo $payer_info
     *
     * @deprecated Use setPayerInfo
     *
     * @return $this
     */
    public function setPayer_info($payer_info)
    {
        $this->payer_info = $payer_info;

        return $this;
    }

    /**
     * Get Payer Info
     *
     * @deprecated Use getPayerInfo
     *
     * @return \PayPal\Api\PayerInfo
     */
    public function getPayer_info()
    {
        return $this->payer_info;
    }
}
