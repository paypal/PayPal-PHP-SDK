<?php


namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class ReportingTransactionInfo
 *
 * Model for transaction info.
 *
 * @package PayPal\Api
 *
 * @property string paypal_account_id
 * @property string transaction_id
 * @property string transaction_event_code
 * @property string transaction_initiation_date
 * @property string transaction_updated_date
 * @property \PayPal\Api\ReportingTransactionAmount transaction_amount
 * @property \PayPal\Api\ReportingTransactionAmount fee_amount
 * @property \PayPal\Api\ReportingTransactionAmount ending_balance
 * @property \PayPal\Api\ReportingTransactionAmount available_balance
 * @property string invoice_id
 * @property string protection_elegibility
 */
class ReportingTransactionInfo extends PayPalModel
{

    /**
     * The ID of the PayPal account of the counterparty.
     *
     * @return string
     */
    public function getPaypalAccountId()
    {
        return $this->paypalAccountId;
    }

    /**
     * The ID of the PayPal account of the counterparty.
     *
     * @param string $paypalAccountId
     */
    public function setPaypalAccountId($paypalAccountId)
    {
        $this->paypalAccountId = $paypalAccountId;
    }

    /**
     * The PayPal-generated transaction ID.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * The PayPal-generated transaction ID.
     *
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * A five-digit transaction event code that classifies the transaction type based on money movement and debit or credit. For example, T0001. See Transaction event codes.
     *
     * @return string
     */
    public function getTransactionEventCode()
    {
        return $this->transactionEventCode;
    }

    /**
     * A five-digit transaction event code that classifies the transaction type based on money movement and debit or credit. For example, T0001. See Transaction event codes.
     *
     * @param string $transactionEventCode
     */
    public function setTransactionEventCode($transactionEventCode)
    {
        $this->transactionEventCode = $transactionEventCode;
    }

    /**
     * The date and time when work on a transaction began in the PayPal system, as expressed in the time zone of the account on this side of the payment. Specify the value in Internet date and time format.
     *
     * @return string
     */
    public function getTransactionInitiationDate()
    {
        return $this->transactionInitiationDate;
    }

    /**
     * The date and time when work on a transaction began in the PayPal system, as expressed in the time zone of the account on this side of the payment. Specify the value in Internet date and time format.
     *
     * @param string $transactionInitiationDate
     */
    public function setTransactionInitiationDate($transactionInitiationDate)
    {
        $this->transactionInitiationDate = $transactionInitiationDate;
    }

    /**
     * The date and time when the transaction was last changed, as expressed in the time zone of the account on this side of the payment. Specify the value in Internet date and time format.
     *
     * @return string
     */
    public function getTransactionUpdatedDate()
    {
        return $this->transactionUpdatedDate;
    }

    /**
     * The date and time when the transaction was last changed, as expressed in the time zone of the account on this side of the payment. Specify the value in Internet date and time format.
     *
     * @param string $transactionUpdatedDate
     */
    public function setTransactionUpdatedDate($transactionUpdatedDate)
    {
        $this->transactionUpdatedDate = $transactionUpdatedDate;
    }

    /**
     * The all-inclusive gross transaction amount that was transferred between the sender and receiver through PayPal.
     *
     * @return \PayPal\Api\ReportingTransactionAmount
     */
    public function getTransactionAmount()
    {
        return $this->transactionAmount;
    }

    /**
     * The all-inclusive gross transaction amount that was transferred between the sender and receiver through PayPal.
     *
     * @param \PayPal\Api\ReportingTransactionAmount $transactionAmount
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transactionAmount = $transactionAmount;
    }

    /**
     * The PayPal fee amount. All transaction fees are included in this amount, which is the record of fee associated with the transaction.
     *
     * @return \PayPal\Api\ReportingTransactionAmount
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * The PayPal fee amount. All transaction fees are included in this amount, which is the record of fee associated with the transaction.
     *
     * @param \PayPal\Api\ReportingTransactionAmount $feeAmount
     */
    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;
    }

    /**
     * Filters the transactions in the response by a PayPal transaction status code.
     *
     * @return string
     */
    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }

    /**
     * Filters the transactions in the response by a PayPal transaction status code.
     *
     * @param string $transactionStatus
     */
    public function setTransactionStatus($transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;
    }

    /**
     * The ending balance.
     *
     * @return \PayPal\Api\ReportingTransactionAmount
     */
    public function getEndingBalance()
    {
        return $this->endingBalance;
    }

    /**
     * The ending balance.
     *
     * @param \PayPal\Api\ReportingTransactionAmount $endingBalance
     */
    public function setEndingBalance($endingBalance)
    {
        $this->endingBalance = $endingBalance;
    }

    /**
     * The available amount of transaction currency during the completion of this transaction.
     *
     * @return \PayPal\Api\ReportingTransactionAmount
     */
    public function getAvailableBalance()
    {
        return $this->availableBalance;
    }

    /**
     * The available amount of transaction currency during the completion of this transaction.
     *
     * @param \PayPal\Api\ReportingTransactionAmount $availableBalance
     */
    public function setAvailableBalance($availableBalance)
    {
        $this->availableBalance = $availableBalance;
    }

    /**
     * The invoice ID that is sent by the merchant with the transaction.
     *
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * The invoice ID that is sent by the merchant with the transaction.
     *
     * @param string $invoiceId
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * Indicates whether the transaction is eligible for protection.
     *
     * @return string
     */
    public function getProtectionEligibility()
    {
        return $this->protectionEligibility;
    }

    /**
     * Indicates whether the transaction is eligible for protection.
     *
     * @param string $protectionElegibility
     */
    public function setProtectionEligibility($protectionElegibility)
    {
        $this->protectionEligibility = $protectionElegibility;
    }
}
