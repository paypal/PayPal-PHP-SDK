<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Payer
 *
 * A resource representing a Payer that funds a payment.
 *
 * @package PayPal\Api
 *
 * @property string payment_method
 * @property string status
 * @property \PayPal\Api\FundingInstrument funding_instruments
 * @property string funding_option_id
 * @property \PayPal\Api\PayerInfo payer_info
 */
class Payer extends PPModel
{
    /**
     * Payment method being used - PayPal Wallet payment, Bank Direct Debit  or Direct Credit card.
     * Valid Values: ["credit_card", "bank", "paypal"] 
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
     * Payment method being used - PayPal Wallet payment, Bank Direct Debit  or Direct Credit card.
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Payment method being used - PayPal Wallet payment, Bank Direct Debit  or Direct Credit card.
     *
     * @deprecated Instead use setPaymentMethod
     *
     * @param string $payment_method
     * @return $this
     */
    public function setPayment_method($payment_method)
    {
        $this->payment_method = $payment_method;
        return $this;
    }

    /**
     * Payment method being used - PayPal Wallet payment, Bank Direct Debit  or Direct Credit card.
     * @deprecated Instead use getPaymentMethod
     *
     * @return string
     */
    public function getPayment_method()
    {
        return $this->payment_method;
    }

    /**
     * Status of Payer PayPal Account.
     * Valid Values: ["VERIFIED", "UNVERIFIED"] 
     *
     * @param string $status
     * 
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Status of Payer PayPal Account.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * List of funding instruments from where the funds of the current payment come from. Typically a credit card.
     * 
     *
     * @param \PayPal\Api\FundingInstrument $funding_instruments
     * 
     * @return $this
     */
    public function setFundingInstruments($funding_instruments)
    {
        $this->funding_instruments = $funding_instruments;
        return $this;
    }

    /**
     * List of funding instruments from where the funds of the current payment come from. Typically a credit card.
     *
     * @return \PayPal\Api\FundingInstrument[]
     */
    public function getFundingInstruments()
    {
        return $this->funding_instruments;
    }

    /**
     * List of funding instruments from where the funds of the current payment come from. Typically a credit card.
     *
     * @deprecated Instead use setFundingInstruments
     *
     * @param \PayPal\Api\FundingInstrument $funding_instruments
     * @return $this
     */
    public function setFunding_instruments($funding_instruments)
    {
        $this->funding_instruments = $funding_instruments;
        return $this;
    }

    /**
     * List of funding instruments from where the funds of the current payment come from. Typically a credit card.
     * @deprecated Instead use getFundingInstruments
     *
     * @return \PayPal\Api\FundingInstrument
     */
    public function getFunding_instruments()
    {
        return $this->funding_instruments;
    }

    /**
     * Id of user selected funding option for the payment. 'OneOf' funding_instruments or funding_option_id to be present 
     * 
     *
     * @param string $funding_option_id
     * 
     * @return $this
     */
    public function setFundingOptionId($funding_option_id)
    {
        $this->funding_option_id = $funding_option_id;
        return $this;
    }

    /**
     * Id of user selected funding option for the payment. 'OneOf' funding_instruments or funding_option_id to be present 
     *
     * @return string
     */
    public function getFundingOptionId()
    {
        return $this->funding_option_id;
    }

    /**
     * Id of user selected funding option for the payment. 'OneOf' funding_instruments or funding_option_id to be present 
     *
     * @deprecated Instead use setFundingOptionId
     *
     * @param string $funding_option_id
     * @return $this
     */
    public function setFunding_option_id($funding_option_id)
    {
        $this->funding_option_id = $funding_option_id;
        return $this;
    }

    /**
     * Id of user selected funding option for the payment. 'OneOf' funding_instruments or funding_option_id to be present 
     * @deprecated Instead use getFundingOptionId
     *
     * @return string
     */
    public function getFunding_option_id()
    {
        return $this->funding_option_id;
    }

    /**
     * Information related to the Payer. 
     * 
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
     * Information related to the Payer. 
     *
     * @return \PayPal\Api\PayerInfo
     */
    public function getPayerInfo()
    {
        return $this->payer_info;
    }

    /**
     * Information related to the Payer. 
     *
     * @deprecated Instead use setPayerInfo
     *
     * @param \PayPal\Api\PayerInfo $payer_info
     * @return $this
     */
    public function setPayer_info($payer_info)
    {
        $this->payer_info = $payer_info;
        return $this;
    }

    /**
     * Information related to the Payer. 
     * @deprecated Instead use getPayerInfo
     *
     * @return \PayPal\Api\PayerInfo
     */
    public function getPayer_info()
    {
        return $this->payer_info;
    }

}
