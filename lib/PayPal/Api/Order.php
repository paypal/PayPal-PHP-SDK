<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Order
 * 
 * @property string             id
 * @property string             createTime
 * @property string             updateTime
 * @property string             state
 * @property \PayPal\Api\Amount amount
 * @property string             parentPayment
 * @property \PayPal\Api\Links  links
 * @property string             reasonCode
 */
class Order extends PPModel
{
    /**
     * Set the identifier of the order transaction.
     * 
     * @param string $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the identifier of the order transaction.
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the time the resource was created.
     * 
     * @param string $create_time
     * 
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;

        return $this;
    }

    /**
     * Get the time the resource was created.
     * 
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set the time the resource was last updated.
     * 
     * @param string $update_time
     * 
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;

        return $this;
    }

    /**
     * Get the time the resource was last updated.
     * 
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Set the state of the order transaction.
     * 
     * Allowed values are: `PENDING`, `COMPLETED`, `REFUNDED` or `PARTIALLY_REFUNDED`.
     * 
     * @param string $state
     * 
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the state of the order transaction.
     * 
     * Allowed values are: `PENDING`, `COMPLETED`, `REFUNDED` or `PARTIALLY_REFUNDED`.
     * 
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the amount being collected.
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
     * Get the amount being collected.
     * 
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set ID of the payment resource on which this transaction is based.
     * 
     * @param string $parent_payment
     * 
     * @return $this
     */
    public function setParentPayment($parent_payment)
    {
        $this->parent_payment = $parent_payment;

        return $this;
    }

    /**
     * Get ID of the payment resource on which this transaction is based.
     * 
     * @return string
     */
    public function getParentPayment()
    {
        return $this->parent_payment;
    }

    /**
     * Set Links
     * 
     * @param \PayPal\Api\Links $links
     * 
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get Links
     * 
     * @return \PayPal\Api\Links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Reason code for the transaction state being Pending or Reversed. Assigned in response.
     * 
     * Allowed values: `CHARGEBACK`, `GUARANTEE`, `BUYER_COMPLAINT`, `REFUND`,
     * `UNCONFIRMED_SHIPPING_ADDRESS`,
     * `ECHECK`, `INTERNATIONAL_WITHDRAWAL`,
     * `RECEIVING_PREFERENCE_MANDATES_MANUAL_ACTION`, `PAYMENT_REVIEW`,
     * `REGULATORY_REVIEW`, `UNILATERAL`, or `VERIFICATION_REQUIRED`
     * (`ORDER` can also be set in the response).
     * 
     * @param string $reason_code
     * 
     * @return $this
     */
    public function setReasonCode($reason_code)
    {
        $this->reason_code = $reason_code;

        return $this;
    }

    /**
     * Reason code for the transaction state being Pending or Reversed. Assigned in response.
     * 
     * Allowed values: `CHARGEBACK`, `GUARANTEE`, `BUYER_COMPLAINT`, `REFUND`,
     * `UNCONFIRMED_SHIPPING_ADDRESS`,
     * `ECHECK`, `INTERNATIONAL_WITHDRAWAL`,
     * `RECEIVING_PREFERENCE_MANDATES_MANUAL_ACTION`, `PAYMENT_REVIEW`,
     * `REGULATORY_REVIEW`, `UNILATERAL`, or `VERIFICATION_REQUIRED`
     * (`ORDER` can also be set in the response).
     * 
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }
}
