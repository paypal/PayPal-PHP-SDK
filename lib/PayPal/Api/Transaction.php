<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class Transaction
 *
 * @property \PayPal\Api\Amount           amount
 * @property \PayPal\Api\Payee            payee
 * @property string                       description
 * @property \PayPal\Api\ItemList         item_list
 * @property \PayPal\Api\RelatedResources related_resources
 * @property \PayPal\Api\Transaction      transactions
 */
class Transaction extends PPModel
{
    /**
     * Set Amount
     * Amount being collected
     *
     * @param \PayPal\Api\Amount $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get Amount
     * Amount being collected
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set Payee
     * Recepient of the funds in this transaction
     *
     * @param \PayPal\Api\Payee $payee
     *
     * @return $this
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;

        return $this;
    }

    /**
     * Get Payee
     * Recepient of the funds in this transaction
     *
     * @return \PayPal\Api\Payee
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * Set Description
     * Description of what is being paid for
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get Description
     * Description of what is being paid for
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Item List
     * List of items being paid for
     *
     * @param \PayPal\Api\ItemList $item_list
     *
     * @return $this
     */
    public function setItemList($item_list)
    {
        $this->item_list = $item_list;

        return $this;
    }

    /**
     * Get Item List
     * List of items being paid for
     *
     * @return \PayPal\Api\ItemList
     */
    public function getItemList()
    {
        return $this->item_list;
    }

    /**
     * Set Item List
     * List of items being paid for
     *
     * @param \PayPal\Api\ItemList $item_list
     *
     * @deprecated Use setItemList
     *
     * @return $this
     */
    public function setItem_list($item_list)
    {
        $this->item_list = $item_list;

        return $this;
    }

    /**
     * Get Item List
     * List of items being paid for
     *
     * @deprecated Use getItemList
     *
     * @return \PayPal\Api\ItemList
     */
    public function getItem_list()
    {
        return $this->item_list;
    }

    /**
     * Set Related Resources
     * List of financial transactions (Sale, Authorization, Capture, Refund) related to the payment
     *
     * @param \PayPal\Api\RelatedResources $related_resources
     *
     * @return $this
     */
    public function setRelatedResources($related_resources)
    {
        $this->related_resources = $related_resources;

        return $this;
    }

    /**
     * Get Related Resources
     * List of financial transactions (Sale, Authorization, Capture, Refund) related to the payment
     *
     * @return \PayPal\Api\RelatedResources
     */
    public function getRelatedResources()
    {
        return $this->related_resources;
    }

    /**
     * Set Related Resources
     * List of financial transactions (Sale, Authorization, Capture, Refund) related to the payment
     *
     * @param \PayPal\Api\RelatedResources $related_resources
     *
     * @deprecated Use setRelatedResources
     *
     * @return $this
     */
    public function setRelated_resources($related_resources)
    {
        $this->related_resources = $related_resources;

        return $this;
    }

    /**
     * Get Related Resources
     * List of financial transactions (Sale, Authorization, Capture, Refund) related to the payment
     *
     * @deprecated Use getRelatedResources
     *
     * @return \PayPal\Api\RelatedResources
     */
    public function getRelated_resources()
    {
        return $this->related_resources;
    }

    /**
     * Set Transactions
     * Additional transactions for complex payment (Parallel and Chained) scenarios
     *
     * @param \PayPal\Api\self $transactions
     *
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;

        return $this;
    }

    /**
     * Set Transactions
     * Additional transactions for complex payment (Parallel and Chained) scenarios
     *
     * @return \PayPal\Api\self
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
}
