<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class PaymentHistory
 *
 * @property \PayPal\Api\Payment payments
 * @property int                 count
 * @property string              next_id
 */
class PaymentHistory extends PPModel
{
    /**
     * Set Payments
     * A list of Payment resources
     *
     * @param \PayPal\Api\Payment $payments
     *
     * @return $this
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * Get Payments
     * A list of Payment resources
     *
     * @return \PayPal\Api\Payment
     */
    public function getPayments()
    {
        return $this->payments;
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
     * Get Count
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
