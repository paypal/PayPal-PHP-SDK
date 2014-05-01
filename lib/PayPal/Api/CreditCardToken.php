<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class CreditCardToken
 *
 * @property string credit_card_id
 * @property string payer_id
 * @property string last4
 * @property string type
 * @property int    expire_month
 * @property int    expire_year
 */
class CreditCardToken extends PPModel
{
    /**
     * Set Credit Card ID
     * ID of a previously saved Credit Card resource using /vault/credit-card API
     *
     * @param string $credit_card_id
     *
     * @return $this
     */
    public function setCreditCardId($credit_card_id)
    {
        $this->credit_card_id = $credit_card_id;

        return $this;
    }

    /**
     * Get Credit Card ID
     * ID of a previously saved Credit Card resource using /vault/credit-card API
     *
     * @return string
     */
    public function getCreditCardId()
    {
        return $this->credit_card_id;
    }

    /**
     * Set Credit Card ID
     * ID of a previously saved Credit Card resource using /vault/credit-card API
     *
     * @param string $credit_card_id
     *
     * @deprecated Use setCreditCardId
     *
     * @return $this
     */
    public function setCredit_card_id($credit_card_id)
    {
        $this->credit_card_id = $credit_card_id;

        return $this;
    }

    /**
     * Get Credit Card ID
     * ID of a previously saved Credit Card resource using /vault/credit-card API
     *
     * @deprecated Use getCreditCardId
     *
     * @return string
     */
    public function getCredit_card_id()
    {
        return $this->credit_card_id;
    }

    /**
     * Set Payer ID
     * The unique identifier of the payer used when saving this credit card using /vault/credit-card API
     *
     * @param string $payer_id
     *
     * @return $this
     */
    public function setPayerId($payer_id)
    {
        $this->payer_id = $payer_id;

        return $this;
    }

    /**
     * Get Payer ID
     * The unique identifier of the payer used when saving this credit card using /vault/credit-card API
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * Set Payer ID
     * The unique identifier of the payer used when saving this credit card using /vault/credit-card API
     *
     * @param string $payer_id
     *
     * @deprecated Use setPayerId
     *
     * @return $this
     */
    public function setPayer_id($payer_id)
    {
        $this->payer_id = $payer_id;

        return $this;
    }

    /**
     * Get Payer ID
     * The unique identifier of the payer used when saving this credit card using /vault/credit-card API
     *
     * @deprecated Use getPayerId
     *
     * @return string
     */
    public function getPayer_id()
    {
        return $this->payer_id;
    }

    /**
     * Set Last Four
     * Last 4 digits of the card number from the saved card
     *
     * @param string $last4
     *
     * @return $this
     */
    public function setLast4($last4)
    {
        $this->last4 = $last4;

        return $this;
    }

    /**
     * Get Last Four
     * Last 4 digits of the card number from the saved card
     *
     * @return string
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     * Set Type
     * (eg. visa, mastercard, etc) from the saved card
     * Please note that the values are always in lowercase and not meant to be used directly for display
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get Type
     * (eg. visa, mastercard, etc) from the saved card
     * Please note that the values are always in lowercase and not meant to be used directly for display
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Expire Month
     * Card Expiration month from the saved card with value 1 - 12
     *
     * @param int $expire_month
     *
     * @return $this
     */
    public function setExpireMonth($expire_month)
    {
        $this->expire_month = $expire_month;

        return $this;
    }

    /**
     * Get Expire Month
     * Card Expiration month from the saved card with value 1 - 12
     *
     * @return int
     */
    public function getExpireMonth()
    {
        return $this->expire_month;
    }

    /**
     * Set Expire Month
     * Card Expiration month from the saved card with value 1 - 12
     *
     * @param int $expire_month
     *
     * @deprecated Use setExpireMonth
     *
     * @return $this
     */
    public function setExpire_month($expire_month)
    {
        $this->expire_month = $expire_month;

        return $this;
    }

    /**
     * Get Expire Month
     * Card Expiration month from the saved card with value 1 - 12
     *
     * @deprecated Use getExpireMonth
     *
     * @return int
     */
    public function getExpire_month()
    {
        return $this->expire_month;
    }

    /**
     * Set Expire Year
     * 4 digit card expiry year from the saved card
     *
     * @param int $expire_year
     *
     * @return $this
     */
    public function setExpireYear($expire_year)
    {
        $this->expire_year = $expire_year;

        return $this;
    }

    /**
     * Get Expire Year
     * 4 digit card expiry year from the saved card
     *
     * @return int
     */
    public function getExpireYear()
    {
        return $this->expire_year;
    }

    /**
     * Set Expire Year
     * 4 digit card expiry year from the saved card
     *
     * @param int $expire_year
     *
     * @deprecated Use setExpireYear
     *
     * @return $this
     */
    public function setExpire_year($expire_year)
    {
        $this->expire_year = $expire_year;

        return $this;
    }

    /**
     * Get Expire Year
     * 4 digit card expiry year from the saved card
     *
     * @deprecated Use getExpireYear
     *
     * @return int
     */
    public function getExpire_year()
    {
        return $this->expire_year;
    }
}
