<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class FundingInstrument
 *
 * A resource representing a Payer's funding instrument.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\CreditCard credit_card
 * @property \PayPal\Api\CreditCardToken credit_card_token
 * @property \PayPal\Api\PaymentCard payment_card
 * @property \PayPal\Api\PaymentCardToken payment_card_token
 * @property \PayPal\Api\ExtendedBankAccount bank_account
 * @property \PayPal\Api\BankToken bank_account_token
 * @property \PayPal\Api\Credit credit
 */
class FundingInstrument extends PPModel
{
    /**
     * Credit Card information.
     * 
     *
     * @param \PayPal\Api\CreditCard $credit_card
     * 
     * @return $this
     */
    public function setCreditCard($credit_card)
    {
        $this->credit_card = $credit_card;
        return $this;
    }

    /**
     * Credit Card information.
     *
     * @return \PayPal\Api\CreditCard
     */
    public function getCreditCard()
    {
        return $this->credit_card;
    }

    /**
     * Credit Card information.
     *
     * @deprecated Instead use setCreditCard
     *
     * @param \PayPal\Api\CreditCard $credit_card
     * @return $this
     */
    public function setCredit_card($credit_card)
    {
        $this->credit_card = $credit_card;
        return $this;
    }

    /**
     * Credit Card information.
     * @deprecated Instead use getCreditCard
     *
     * @return \PayPal\Api\CreditCard
     */
    public function getCredit_card()
    {
        return $this->credit_card;
    }

    /**
     * Credit Card information.
     * 
     *
     * @param \PayPal\Api\CreditCardToken $credit_card_token
     * 
     * @return $this
     */
    public function setCreditCardToken($credit_card_token)
    {
        $this->credit_card_token = $credit_card_token;
        return $this;
    }

    /**
     * Credit Card information.
     *
     * @return \PayPal\Api\CreditCardToken
     */
    public function getCreditCardToken()
    {
        return $this->credit_card_token;
    }

    /**
     * Credit Card information.
     *
     * @deprecated Instead use setCreditCardToken
     *
     * @param \PayPal\Api\CreditCardToken $credit_card_token
     * @return $this
     */
    public function setCredit_card_token($credit_card_token)
    {
        $this->credit_card_token = $credit_card_token;
        return $this;
    }

    /**
     * Credit Card information.
     * @deprecated Instead use getCreditCardToken
     *
     * @return \PayPal\Api\CreditCardToken
     */
    public function getCredit_card_token()
    {
        return $this->credit_card_token;
    }

    /**
     * Payment Card information.
     * 
     *
     * @param \PayPal\Api\PaymentCard $payment_card
     * 
     * @return $this
     */
    public function setPaymentCard($payment_card)
    {
        $this->payment_card = $payment_card;
        return $this;
    }

    /**
     * Payment Card information.
     *
     * @return \PayPal\Api\PaymentCard
     */
    public function getPaymentCard()
    {
        return $this->payment_card;
    }

    /**
     * Payment Card information.
     *
     * @deprecated Instead use setPaymentCard
     *
     * @param \PayPal\Api\PaymentCard $payment_card
     * @return $this
     */
    public function setPayment_card($payment_card)
    {
        $this->payment_card = $payment_card;
        return $this;
    }

    /**
     * Payment Card information.
     * @deprecated Instead use getPaymentCard
     *
     * @return \PayPal\Api\PaymentCard
     */
    public function getPayment_card()
    {
        return $this->payment_card;
    }

    /**
     * Payment card token information.
     * 
     *
     * @param \PayPal\Api\PaymentCardToken $payment_card_token
     * 
     * @return $this
     */
    public function setPaymentCardToken($payment_card_token)
    {
        $this->payment_card_token = $payment_card_token;
        return $this;
    }

    /**
     * Payment card token information.
     *
     * @return \PayPal\Api\PaymentCardToken
     */
    public function getPaymentCardToken()
    {
        return $this->payment_card_token;
    }

    /**
     * Payment card token information.
     *
     * @deprecated Instead use setPaymentCardToken
     *
     * @param \PayPal\Api\PaymentCardToken $payment_card_token
     * @return $this
     */
    public function setPayment_card_token($payment_card_token)
    {
        $this->payment_card_token = $payment_card_token;
        return $this;
    }

    /**
     * Payment card token information.
     * @deprecated Instead use getPaymentCardToken
     *
     * @return \PayPal\Api\PaymentCardToken
     */
    public function getPayment_card_token()
    {
        return $this->payment_card_token;
    }

    /**
     * Bank Account information.
     * 
     *
     * @param \PayPal\Api\ExtendedBankAccount $bank_account
     * 
     * @return $this
     */
    public function setBankAccount($bank_account)
    {
        $this->bank_account = $bank_account;
        return $this;
    }

    /**
     * Bank Account information.
     *
     * @return \PayPal\Api\ExtendedBankAccount
     */
    public function getBankAccount()
    {
        return $this->bank_account;
    }

    /**
     * Bank Account information.
     *
     * @deprecated Instead use setBankAccount
     *
     * @param \PayPal\Api\ExtendedBankAccount $bank_account
     * @return $this
     */
    public function setBank_account($bank_account)
    {
        $this->bank_account = $bank_account;
        return $this;
    }

    /**
     * Bank Account information.
     * @deprecated Instead use getBankAccount
     *
     * @return \PayPal\Api\ExtendedBankAccount
     */
    public function getBank_account()
    {
        return $this->bank_account;
    }

    /**
     * Bank Account information.
     * 
     *
     * @param \PayPal\Api\BankToken $bank_account_token
     * 
     * @return $this
     */
    public function setBankAccountToken($bank_account_token)
    {
        $this->bank_account_token = $bank_account_token;
        return $this;
    }

    /**
     * Bank Account information.
     *
     * @return \PayPal\Api\BankToken
     */
    public function getBankAccountToken()
    {
        return $this->bank_account_token;
    }

    /**
     * Bank Account information.
     *
     * @deprecated Instead use setBankAccountToken
     *
     * @param \PayPal\Api\BankToken $bank_account_token
     * @return $this
     */
    public function setBank_account_token($bank_account_token)
    {
        $this->bank_account_token = $bank_account_token;
        return $this;
    }

    /**
     * Bank Account information.
     * @deprecated Instead use getBankAccountToken
     *
     * @return \PayPal\Api\BankToken
     */
    public function getBank_account_token()
    {
        return $this->bank_account_token;
    }

    /**
     * Credit funding information.
     * 
     *
     * @param \PayPal\Api\Credit $credit
     * 
     * @return $this
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;
        return $this;
    }

    /**
     * Credit funding information.
     *
     * @return \PayPal\Api\Credit
     */
    public function getCredit()
    {
        return $this->credit;
    }

}
