<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class PaymentExecution
 *
 * @property string                   payer_id
 * @property \PayPal\Api\Transactions transactions
 */
class PaymentExecution extends PPModel
{
    /**
     * Set Payer ID
     * PayPal assigned Payer ID returned in the approval return url
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
     * PayPal assigned Payer ID returned in the approval return url
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * Set Payer ID
     * PayPal assigned Payer ID returned in the approval return url
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
     * PayPal assigned Payer ID returned in the approval return url
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
     * Set Transactions
     * If the amount needs to be updated after obtaining the PayPal Payer info (eg. shipping address), it can be updated using this element
     *
     * @param \PayPal\Api\Transactions $transactions
     *
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * Get Transactions
     * If the amount needs to be updated after obtaining the PayPal Payer info (eg. shipping address), it can be updated using this element
     *
     * @return \PayPal\Api\Transactions
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
}
