<?php


namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class ReportingTransactionInfo.
 *
 * Model for transaction details.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\ReportingTransactionInfo transaction_info
 */
class ReportingTransactionDetails extends PayPalModel
{
    protected $transactionInfo;
    // @TODO: build rest of fields!

    /**
     * @return \PayPal\Api\ReportingTransactionInfo
     */
    public function getTransactionInfo()
    {
        return $this->transactionInfo;
    }

    /**
     * @param \PayPal\Api\ReportingTransactionInfo $transactionInfo
     */
    public function setTransactionInfo($transactionInfo)
    {
        $this->transactionInfo = $transactionInfo;
    }
}
