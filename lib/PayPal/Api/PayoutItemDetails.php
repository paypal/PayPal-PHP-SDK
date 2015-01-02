<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PayoutItemDetails
 *
 * This object contains status and other data for an individual payout of a batch.
 *
 * @package PayPal\Api
 *
 * @property string payout_item_id
 * @property string transaction_id
 * @property string transaction_status
 * @property \PayPal\Api\Currency payout_item_fee
 * @property string payout_batch_id
 * @property string sender_batch_id
 * @property \PayPal\Api\PayoutItem payout_item
 * @property string time_processed
 * @property \PayPal\Api\Error error
 * @property \PayPal\Api\Links[] links
 */
class PayoutItemDetails extends PayPalModel
{
    /**
     * An ID for an individual payout. Provided by PayPal, such as in the case of getting the status of a batch request. 30 characters max.
     *
     * @param string $payout_item_id
     * 
     * @return $this
     */
    public function setPayoutItemId($payout_item_id)
    {
        $this->payout_item_id = $payout_item_id;
        return $this;
    }

    /**
     * An ID for an individual payout. Provided by PayPal, such as in the case of getting the status of a batch request. 30 characters max.
     *
     * @return string
     */
    public function getPayoutItemId()
    {
        return $this->payout_item_id;
    }

    /**
     * An ID for an individual payout. Provided by PayPal, such as in the case of getting the status of a batch request. 30 characters max.
     *
     * @deprecated Instead use setPayoutItemId
     *
     * @param string $payout_item_id
     * @return $this
     */
    public function setPayout_item_id($payout_item_id)
    {
        $this->payout_item_id = $payout_item_id;
        return $this;
    }

    /**
     * An ID for an individual payout. Provided by PayPal, such as in the case of getting the status of a batch request. 30 characters max.
     * @deprecated Instead use getPayoutItemId
     *
     * @return string
     */
    public function getPayout_item_id()
    {
        return $this->payout_item_id;
    }

    /**
     * Generated ID for the transaction. 30 characters max.
     *
     * @param string $transaction_id
     * 
     * @return $this
     */
    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        return $this;
    }

    /**
     * Generated ID for the transaction. 30 characters max.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Generated ID for the transaction. 30 characters max.
     *
     * @deprecated Instead use setTransactionId
     *
     * @param string $transaction_id
     * @return $this
     */
    public function setTransaction_id($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        return $this;
    }

    /**
     * Generated ID for the transaction. 30 characters max.
     * @deprecated Instead use getTransactionId
     *
     * @return string
     */
    public function getTransaction_id()
    {
        return $this->transaction_id;
    }

    /**
     * Status of a transaction.
     *
     * @param string $transaction_status
     * 
     * @return $this
     */
    public function setTransactionStatus($transaction_status)
    {
        $this->transaction_status = $transaction_status;
        return $this;
    }

    /**
     * Status of a transaction.
     *
     * @return string
     */
    public function getTransactionStatus()
    {
        return $this->transaction_status;
    }

    /**
     * Status of a transaction.
     *
     * @deprecated Instead use setTransactionStatus
     *
     * @param string $transaction_status
     * @return $this
     */
    public function setTransaction_status($transaction_status)
    {
        $this->transaction_status = $transaction_status;
        return $this;
    }

    /**
     * Status of a transaction.
     * @deprecated Instead use getTransactionStatus
     *
     * @return string
     */
    public function getTransaction_status()
    {
        return $this->transaction_status;
    }

    /**
     * Amount of money in U.S. dollars for fees.
     *
     * @param \PayPal\Api\Currency $payout_item_fee
     * 
     * @return $this
     */
    public function setPayoutItemFee($payout_item_fee)
    {
        $this->payout_item_fee = $payout_item_fee;
        return $this;
    }

    /**
     * Amount of money in U.S. dollars for fees.
     *
     * @return \PayPal\Api\Currency
     */
    public function getPayoutItemFee()
    {
        return $this->payout_item_fee;
    }

    /**
     * Amount of money in U.S. dollars for fees.
     *
     * @deprecated Instead use setPayoutItemFee
     *
     * @param \PayPal\Api\Currency $payout_item_fee
     * @return $this
     */
    public function setPayout_item_fee($payout_item_fee)
    {
        $this->payout_item_fee = $payout_item_fee;
        return $this;
    }

    /**
     * Amount of money in U.S. dollars for fees.
     * @deprecated Instead use getPayoutItemFee
     *
     * @return \PayPal\Api\Currency
     */
    public function getPayout_item_fee()
    {
        return $this->payout_item_fee;
    }

    /**
     * An ID for the batch payout. Generated by PayPal. 30 characters max.
     *
     * @param string $payout_batch_id
     * 
     * @return $this
     */
    public function setPayoutBatchId($payout_batch_id)
    {
        $this->payout_batch_id = $payout_batch_id;
        return $this;
    }

    /**
     * An ID for the batch payout. Generated by PayPal. 30 characters max.
     *
     * @return string
     */
    public function getPayoutBatchId()
    {
        return $this->payout_batch_id;
    }

    /**
     * An ID for the batch payout. Generated by PayPal. 30 characters max.
     *
     * @deprecated Instead use setPayoutBatchId
     *
     * @param string $payout_batch_id
     * @return $this
     */
    public function setPayout_batch_id($payout_batch_id)
    {
        $this->payout_batch_id = $payout_batch_id;
        return $this;
    }

    /**
     * An ID for the batch payout. Generated by PayPal. 30 characters max.
     * @deprecated Instead use getPayoutBatchId
     *
     * @return string
     */
    public function getPayout_batch_id()
    {
        return $this->payout_batch_id;
    }

    /**
     * Sender-created ID for tracking the batch in an accounting system. 30 characters max.
     *
     * @param string $sender_batch_id
     * 
     * @return $this
     */
    public function setSenderBatchId($sender_batch_id)
    {
        $this->sender_batch_id = $sender_batch_id;
        return $this;
    }

    /**
     * Sender-created ID for tracking the batch in an accounting system. 30 characters max.
     *
     * @return string
     */
    public function getSenderBatchId()
    {
        return $this->sender_batch_id;
    }

    /**
     * Sender-created ID for tracking the batch in an accounting system. 30 characters max.
     *
     * @deprecated Instead use setSenderBatchId
     *
     * @param string $sender_batch_id
     * @return $this
     */
    public function setSender_batch_id($sender_batch_id)
    {
        $this->sender_batch_id = $sender_batch_id;
        return $this;
    }

    /**
     * Sender-created ID for tracking the batch in an accounting system. 30 characters max.
     * @deprecated Instead use getSenderBatchId
     *
     * @return string
     */
    public function getSender_batch_id()
    {
        return $this->sender_batch_id;
    }

    /**
     * The data for a payout item that the sender initially provided.
     *
     * @param \PayPal\Api\PayoutItem $payout_item
     * 
     * @return $this
     */
    public function setPayoutItem($payout_item)
    {
        $this->payout_item = $payout_item;
        return $this;
    }

    /**
     * The data for a payout item that the sender initially provided.
     *
     * @return \PayPal\Api\PayoutItem
     */
    public function getPayoutItem()
    {
        return $this->payout_item;
    }

    /**
     * The data for a payout item that the sender initially provided.
     *
     * @deprecated Instead use setPayoutItem
     *
     * @param \PayPal\Api\PayoutItem $payout_item
     * @return $this
     */
    public function setPayout_item($payout_item)
    {
        $this->payout_item = $payout_item;
        return $this;
    }

    /**
     * The data for a payout item that the sender initially provided.
     * @deprecated Instead use getPayoutItem
     *
     * @return \PayPal\Api\PayoutItem
     */
    public function getPayout_item()
    {
        return $this->payout_item;
    }

    /**
     * Time of the last processing for this item.
     *
     * @param string $time_processed
     * 
     * @return $this
     */
    public function setTimeProcessed($time_processed)
    {
        $this->time_processed = $time_processed;
        return $this;
    }

    /**
     * Time of the last processing for this item.
     *
     * @return string
     */
    public function getTimeProcessed()
    {
        return $this->time_processed;
    }

    /**
     * Time of the last processing for this item.
     *
     * @deprecated Instead use setTimeProcessed
     *
     * @param string $time_processed
     * @return $this
     */
    public function setTime_processed($time_processed)
    {
        $this->time_processed = $time_processed;
        return $this;
    }

    /**
     * Time of the last processing for this item.
     * @deprecated Instead use getTimeProcessed
     *
     * @return string
     */
    public function getTime_processed()
    {
        return $this->time_processed;
    }

    /**
     * Sets Error
     *
     * @param \PayPal\Api\Error $error
     * 
     * @return $this
     */
    public function setErrors($error)
    {
        $this->errors = $error;
        return $this;
    }

    /**
     * Gets Error
     *
     * @return \PayPal\Api\Error
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
     * 
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }

    /**
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links)
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links)
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }

}
