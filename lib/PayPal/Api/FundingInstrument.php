<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class FundingInstrument
 *
 * @property \PayPal\Api\CreditCard      credit_card
 * @property \PayPal\Api\CreditCardToken credit_card_token
 */
class FundingInstrument extends PPModel
{
    /**
     * Set Credit Card
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
     * Get Credit Card
     *
     * @return \PayPal\Api\CreditCard
     */
    public function getCreditCard()
    {
        return $this->credit_card;
    }

    /**
     * Set Credit Card
     *
     * @param \PayPal\Api\CreditCard $credit_card
     *
     * @deprecated Use setCreditCard
     *
     * @return $this
     */
    public function setCredit_card($credit_card)
    {
        $this->credit_card = $credit_card;

        return $this;
    }

    /**
     * Get Credit Card
     *
     * @deprecated Use getCreditCard
     *
     * @return \PayPal\Api\CreditCard
     */
    public function getCredit_card()
    {
        return $this->credit_card;
    }

    /**
     * Set Credit Card Token
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
     * Get Credit Card Token
     *
     * @return \PayPal\Api\CreditCardToken
     */
    public function getCreditCardToken()
    {
        return $this->credit_card_token;
    }

    /**
     * Set Credit Card Token
     *
     * @param \PayPal\Api\CreditCardToken $credit_card_token
     *
     * @deprecated Use setCreditCardToken
     *
     * @return $this
     */
    public function setCredit_card_token($credit_card_token)
    {
        $this->credit_card_token = $credit_card_token;

        return $this;
    }

    /**
     * Get Credit Card Token
     *
     * @deprecated Use getCreditCardToken
     *
     * @return \PayPal\Api\CreditCardToken
     */
    public function getCredit_card_token()
    {
        return $this->credit_card_token;
    }
}
