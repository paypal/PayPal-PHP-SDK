<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Transaction
 *
 * A transaction defines the contract of a payment - what is the payment for and who is fulfilling it.
 *
 * @package PayPal\Api
 *
 * @property self transactions
 */
class Transaction extends TransactionBase 
{
    /**
     * Additional transactions for complex payment scenarios.
     *
     *
     * @param self $transactions
     *
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * Additional transactions for complex payment scenarios.
     *
     * @return self[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

}
