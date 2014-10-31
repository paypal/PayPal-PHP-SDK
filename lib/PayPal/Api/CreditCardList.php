<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class CreditCardList
 *
 * A list of Credit Card Resources
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\CreditCard[] credit_cards
 * @property int count
 * @property string next_id
 */
class CreditCardList extends PPModel
{
    /**
     * A list of credit card resources
     *
     * @param \PayPal\Api\CreditCard[] $credit_cards
     * 
     * @return $this
     */
    public function setCreditCards($credit_cards)
    {
        $this->{"credit-cards"} = $credit_cards;
        return $this;
    }

    /**
     * A list of credit card resources
     *
     * @return \PayPal\Api\CreditCard[]
     */
    public function getCreditCards()
    {
        return $this->{"credit-cards"};
    }

    /**
     * Append CreditCards to the list.
     *
     * @param \PayPal\Api\CreditCard $creditCard
     * @return $this
     */
    public function addCreditCard($creditCard)
    {
        if (!$this->getCreditCards()) {
            return $this->setCreditCards(array($creditCard));
        } else {
            return $this->setCreditCards(
                array_merge($this->getCreditCards(), array($creditCard))
            );
        }
    }

    /**
     * Remove CreditCards from the list.
     *
     * @param \PayPal\Api\CreditCard $creditCard
     * @return $this
     */
    public function removeCreditCard($creditCard)
    {
        return $this->setCreditCards(
            array_diff($this->getCreditCards(), array($creditCard))
        );
    }

    /**
     * A list of credit card resources
     *
     * @deprecated Instead use setCreditCards
     *
     * @param \PayPal\Api\CreditCard $credit-cards
     * @return $this
     */
    public function setCredit_cards($credit_cards)
    {
        $this->{"credit-cards"} = $credit_cards;
        return $this;
    }

    /**
     * A list of credit card resources
     * @deprecated Instead use getCreditCards
     *
     * @return \PayPal\Api\CreditCard
     */
    public function getCredit_cards()
    {
        return $this->{"credit-cards"};
    }

    /**
     * Number of items returned in each range of results. Note that the last results range could have fewer items than the requested number of items.
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
     * Number of items returned in each range of results. Note that the last results range could have fewer items than the requested number of items.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Identifier of the next element to get the next range of results.
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
     * Identifier of the next element to get the next range of results.
     *
     * @return string
     */
    public function getNextId()
    {
        return $this->next_id;
    }

    /**
     * Identifier of the next element to get the next range of results.
     *
     * @deprecated Instead use setNextId
     *
     * @param string $next_id
     * @return $this
     */
    public function setNext_id($next_id)
    {
        $this->next_id = $next_id;
        return $this;
    }

    /**
     * Identifier of the next element to get the next range of results.
     * @deprecated Instead use getNextId
     *
     * @return string
     */
    public function getNext_id()
    {
        return $this->next_id;
    }

}
