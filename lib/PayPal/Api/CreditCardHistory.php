<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class CreditCardHistory
 *
 * @property int    count
 * @property string next_id
 */
class CreditCardHistory extends PPModel
{
    /**
     * Set Credit Cards
     * A list of credit card resources
     *
     * @param \PayPal\Api\CreditCard $credit_cards
     *
     * @return $this
     */
    public function setCreditCards($credit_cards)
    {
        $this->{"credit-cards"} = $credit_cards;

        return $this;
    }

    /**
     * Get Credit Cards
     * A list of credit card resources
     *
     * @return \PayPal\Api\CreditCard
     */
    public function getCreditCards()
    {
        return $this->{"credit-cards"};
    }

    /**
     * Set Credit Cards
     * A list of credit card resources
     *
     * @param \PayPal\Api\CreditCard $credit_cards
     *
     * @deprecated Use setCreditCards
     *
     * @return $this
     */
    public function setCredit_cards($credit_cards)
    {
        $this->{"credit-cards"} = $credit_cards;

        return $this;
    }

    /**
     * Get Credit Cards
     * A list of credit card resources
     *
     * @deprecated Use getCreditCards
     *
     * @return \PayPal\Api\CreditCard
     */
    public function getCredit_cards()
    {
        return $this->{"credit-cards"};
    }

    /**
     * Set Count
     * Number of items returned in each range of results
     * Note that the last results range could have fewer items than the requested number of items
     *
     * @param int $count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Set Count
     * Number of items returned in each range of results
     * Note that the last results range could have fewer items than the requested number of items
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set Next ID
     * Identifier of the next element to get the next range of results
     *
     * @param string $next_id
     *
     * @return $this
     */
    public function setNextId($next_id)
    {
        $this->next_id = $next_id;

        return $this;
    }

    /**
     * Get Next ID
     * Identifier of the next element to get the next range of results
     *
     * @return string
     */
    public function getNextId()
    {
        return $this->next_id;
    }

    /**
     * Set Next ID
     * Identifier of the next element to get the next range of results
     *
     * @param string $next_id
     *
     * @deprecated Use setNextId
     *
     * @return $this
     */
    public function setNext_id($next_id)
    {
        $this->next_id = $next_id;

        return $this;
    }

    /**
     * Get Next ID
     * Identifier of the next element to get the next range of results
     *
     * @deprecated Use getNextId
     *
     * @return string
     */
    public function getNext_id()
    {
        return $this->next_id;
    }
}
