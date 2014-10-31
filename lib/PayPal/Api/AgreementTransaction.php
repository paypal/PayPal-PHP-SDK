<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class AgreementTransaction
 *
 * A resource representing an agreement_transaction that is returned during a transaction search.
 *
 * @package PayPal\Api
 *
 * @property string transaction_id
 * @property string status
 * @property string transaction_type
 * @property \PayPal\Api\Currency amount
 * @property \PayPal\Api\Currency fee_amount
 * @property \PayPal\Api\Currency net_amount
 * @property string payer_email
 * @property string payer_name
 * @property string time_updated
 * @property string time_zone
 */
class AgreementTransaction extends PPModel
{
    /**
     * Id corresponding to this transaction.
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
     * Id corresponding to this transaction.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Id corresponding to this transaction.
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
     * Id corresponding to this transaction.
     * @deprecated Instead use getTransactionId
     *
     * @return string
     */
    public function getTransaction_id()
    {
        return $this->transaction_id;
    }

    /**
     * State of the subscription at this time.
     *
     * @param string $status
     * 
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * State of the subscription at this time.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Type of transaction, usually Recurring Payment.
     *
     * @param string $transaction_type
     * 
     * @return $this
     */
    public function setTransactionType($transaction_type)
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    /**
     * Type of transaction, usually Recurring Payment.
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * Type of transaction, usually Recurring Payment.
     *
     * @deprecated Instead use setTransactionType
     *
     * @param string $transaction_type
     * @return $this
     */
    public function setTransaction_type($transaction_type)
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    /**
     * Type of transaction, usually Recurring Payment.
     * @deprecated Instead use getTransactionType
     *
     * @return string
     */
    public function getTransaction_type()
    {
        return $this->transaction_type;
    }

    /**
     * Amount for this transaction.
     *
     * @param \PayPal\Api\Currency $amount
     * 
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Amount for this transaction.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Fee amount for this transaction.
     *
     * @param \PayPal\Api\Currency $fee_amount
     * 
     * @return $this
     */
    public function setFeeAmount($fee_amount)
    {
        $this->fee_amount = $fee_amount;
        return $this;
    }

    /**
     * Fee amount for this transaction.
     *
     * @return \PayPal\Api\Currency
     */
    public function getFeeAmount()
    {
        return $this->fee_amount;
    }

    /**
     * Fee amount for this transaction.
     *
     * @deprecated Instead use setFeeAmount
     *
     * @param \PayPal\Api\Currency $fee_amount
     * @return $this
     */
    public function setFee_amount($fee_amount)
    {
        $this->fee_amount = $fee_amount;
        return $this;
    }

    /**
     * Fee amount for this transaction.
     * @deprecated Instead use getFeeAmount
     *
     * @return \PayPal\Api\Currency
     */
    public function getFee_amount()
    {
        return $this->fee_amount;
    }

    /**
     * Net amount for this transaction.
     *
     * @param \PayPal\Api\Currency $net_amount
     * 
     * @return $this
     */
    public function setNetAmount($net_amount)
    {
        $this->net_amount = $net_amount;
        return $this;
    }

    /**
     * Net amount for this transaction.
     *
     * @return \PayPal\Api\Currency
     */
    public function getNetAmount()
    {
        return $this->net_amount;
    }

    /**
     * Net amount for this transaction.
     *
     * @deprecated Instead use setNetAmount
     *
     * @param \PayPal\Api\Currency $net_amount
     * @return $this
     */
    public function setNet_amount($net_amount)
    {
        $this->net_amount = $net_amount;
        return $this;
    }

    /**
     * Net amount for this transaction.
     * @deprecated Instead use getNetAmount
     *
     * @return \PayPal\Api\Currency
     */
    public function getNet_amount()
    {
        return $this->net_amount;
    }

    /**
     * Email id of payer.
     *
     * @param string $payer_email
     * 
     * @return $this
     */
    public function setPayerEmail($payer_email)
    {
        $this->payer_email = $payer_email;
        return $this;
    }

    /**
     * Email id of payer.
     *
     * @return string
     */
    public function getPayerEmail()
    {
        return $this->payer_email;
    }

    /**
     * Email id of payer.
     *
     * @deprecated Instead use setPayerEmail
     *
     * @param string $payer_email
     * @return $this
     */
    public function setPayer_email($payer_email)
    {
        $this->payer_email = $payer_email;
        return $this;
    }

    /**
     * Email id of payer.
     * @deprecated Instead use getPayerEmail
     *
     * @return string
     */
    public function getPayer_email()
    {
        return $this->payer_email;
    }

    /**
     * Business name of payer.
     *
     * @param string $payer_name
     * 
     * @return $this
     */
    public function setPayerName($payer_name)
    {
        $this->payer_name = $payer_name;
        return $this;
    }

    /**
     * Business name of payer.
     *
     * @return string
     */
    public function getPayerName()
    {
        return $this->payer_name;
    }

    /**
     * Business name of payer.
     *
     * @deprecated Instead use setPayerName
     *
     * @param string $payer_name
     * @return $this
     */
    public function setPayer_name($payer_name)
    {
        $this->payer_name = $payer_name;
        return $this;
    }

    /**
     * Business name of payer.
     * @deprecated Instead use getPayerName
     *
     * @return string
     */
    public function getPayer_name()
    {
        return $this->payer_name;
    }

    /**
     * Time at which this transaction happened.
     *
     * @param string $time_updated
     * 
     * @return $this
     */
    public function setTimeUpdated($time_updated)
    {
        $this->time_updated = $time_updated;
        return $this;
    }

    /**
     * Time at which this transaction happened.
     *
     * @return string
     */
    public function getTimeUpdated()
    {
        return $this->time_updated;
    }

    /**
     * Time at which this transaction happened.
     *
     * @deprecated Instead use setTimeUpdated
     *
     * @param string $time_updated
     * @return $this
     */
    public function setTime_updated($time_updated)
    {
        $this->time_updated = $time_updated;
        return $this;
    }

    /**
     * Time at which this transaction happened.
     * @deprecated Instead use getTimeUpdated
     *
     * @return string
     */
    public function getTime_updated()
    {
        return $this->time_updated;
    }

    /**
     * Time zone of time_updated field.
     *
     * @param string $time_zone
     * 
     * @return $this
     */
    public function setTimeZone($time_zone)
    {
        $this->time_zone = $time_zone;
        return $this;
    }

    /**
     * Time zone of time_updated field.
     *
     * @return string
     */
    public function getTimeZone()
    {
        return $this->time_zone;
    }

    /**
     * Time zone of time_updated field.
     *
     * @deprecated Instead use setTimeZone
     *
     * @param string $time_zone
     * @return $this
     */
    public function setTime_zone($time_zone)
    {
        $this->time_zone = $time_zone;
        return $this;
    }

    /**
     * Time zone of time_updated field.
     * @deprecated Instead use getTimeZone
     *
     * @return string
     */
    public function getTime_zone()
    {
        return $this->time_zone;
    }

}
