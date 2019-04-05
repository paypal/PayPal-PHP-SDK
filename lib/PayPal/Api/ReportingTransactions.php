<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Core\PayPalConstants;
use PayPal\Validation\ArgumentValidator;
use PayPal\Rest\ApiContext;

/**
 * Class ReportingTransactions
 *
 * Lets you get transactions using Paypal Sync api.
 *
 * @package PayPal\Api
 *
 */
class ReportingTransactions extends PayPalResourceModel
{
    protected $startDate;
    protected $endDate;

    protected $transactionDetails = array();
    protected $totalItems;

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param int $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }

    /**
     * An array of transaction detail objects.
     *
     * @return \PayPal\Api\ReportingTransactionDetails[]
     */
    public function getTransactionDetails()
        return $this->transactionDetails;
    }

    /**
     * An array of transaction detail objects.
     *
     * @param \PayPal\Api\ReportingTransactionDetails[] $transactionDetails
     */
    public function setTransactionDetails($transactionDetails)
    {
        $this->transactionDetails = array_merge($this->transactionDetails, $transactionDetails);
    }

    public static function get($params, $apiContext, $restCall = null) {
        ArgumentValidator::validate($params, 'params');
        $payLoad = "";
        $allowedParams = array(
            'transaction_amount' => 1,
            'transaction_currency' => 1,
            'start_date' => 1,
            'end_date' => 1,
            'payment_instrument_type' => 1,
            'store_id' => 1,
            'terminal_id' => 1,
            'fields' => 1,
            'balance_affecting_records_only' => 1,
            'page_size' => 1,
            'page' => 1,
        );
        $json = self::executeCall(
            "/v1/reporting/transactions?" . http_build_query(array_intersect_key($params, $allowedParams)),
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $reporting_transactions = new ReportingTransactions();
        $reporting_transactions->fromJson($json);
        return $reporting_transactions;
    }

    public static function all($params, $apiContext) {

    }

}
