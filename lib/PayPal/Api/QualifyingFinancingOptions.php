<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class QualifyingFinancingOptions
 *
 * A transaction defines the contract of a payment - what is the payment for and who is fulfilling it.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\CreditFinancing    credit_financing
 * @property \PayPal\Api\Currency           min_amount
 * @property string                         monthly_percentage_rate
 * @property \PayPal\Api\Currency           monthly_payment
 * @property \PayPal\Api\Currency           total_interest
 * @property \PayPal\Api\Currency           total_cost
 * @property bool                           paypal_subsidy
 */
class QualifyingFinancingOptions extends PayPalModel
{
    /**
     * Credit Financing details.
     *
     * @return \PayPal\Api\CreditFinancing
     *
     * @return $this
     */
    public function setCreditFinancing($credit_financing)
    {
        $this->credit_financing = $credit_financing;
        return $this;
    }

    /**
     * Credit Financing details.
     *
     * @return \PayPal\Api\CreditFinancing
     */
    public function getCreditFinancing()
    {
        return $this->credit_financing;
    }

    /**
     * Minimum Amount details.
     *
     * @param \PayPal\Api\Currency $min_amount
     *
     * @return $this
     */
    public function setMinAmount($min_amount)
    {
        $this->min_amount = $min_amount;
        return $this;
    }

    /**
     * Minimum Amount details.
     *
     * @return \PayPal\Api\Currency
     */
    public function getMinAmount()
    {
        return $this->min_amount;
    }

    /**
     * Monthly percentage rate.
     *
     * @param string $monthly_percentage_rate
     *
     * @return $this
     */
    public function setMonthlyPercentageRate($monthly_percentage_rate)
    {
        $this->monthly_percentage_rate = $monthly_percentage_rate;
        return $this;
    }

    /**
     * Monthly percentage rate.
     *
     * @return string
     */
    public function getMonthlyPercentageRate()
    {
        return $this->monthly_percentage_rate;
    }

    /**
     * Monthly payment details.
     *
     * @param \PayPal\Api\Currency $monthly_payment
     *
     * @return $this
     */
    public function setMonthlyPayment($monthly_payment)
    {
        $this->monthly_payment = $monthly_payment;
        return $this;
    }

    /**
     * Monthly payment details.
     *
     * @return \PayPal\Api\Currency
     */
    public function getMonthlyPayment()
    {
        return $this->monthly_payment;
    }

    /**
     * Total interest details.
     *
     * @param \PayPal\Api\Currency $total_interest
     *
     * @return $this
     */
    public function setTotalInterest($total_interest)
    {
        $this->total_interest = $total_interest;
        return $this;
    }

    /**
     * Total interest details.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTotalInterest()
    {
        return $this->total_interest;
    }

    /**
     * Total cost details.
     *
     * @param \PayPal\Api\Currency $total_cost
     *
     * @return $this
     */
    public function setTotalCost($total_cost)
    {
        $this->total_cost = $total_cost;
        return $this;
    }

    /**
     * Total cost details.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTotalCost()
    {
        return $this->total_cost;
    }

    /**
     * Paypal subsidy.
     *
     * @param bool $paypal_subsidy
     *
     * @return $this
     */
    public function setPaypalSubsidy($paypal_subsidy)
    {
        $this->paypal_subsidy = $paypal_subsidy;
        return $this;
    }

    /**
     * Paypal subsidy.
     *
     * @return bool
     */
    public function getPaypalSubsidy()
    {
        return $this->paypal_subsidy;
    }

}
