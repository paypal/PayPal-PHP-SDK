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
    {
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

    /**
     * Main request to get the transactions.
     *
     * Api endpoint: /v1/reporting/transactions.
     *
     * @param array $params
     *   Query parameters.
     * @param \PayPal\Rest\ApiContext $apiContext
     *   Api context.
     * @param \PayPal\Transport\PayPalRestCall $restCall
     *    Rest call.
     *
     * @return string
     *   API response.
     */
    protected static function requestTransactions($params, $apiContext, $restCall = null)
    {
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
        return self::executeCall(
            "/v1/reporting/transactions?" . http_build_query(array_intersect_key($params, $allowedParams)),
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
    }

    /**
     * Lists transactions. Specify one or more query parameters to filter the transaction that appear in the response.
     *
     * @param array $params
     *   Query parameters.
     * @param \PayPal\Rest\ApiContext $apiContext
     *   Api context.
     * @param \PayPal\Transport\PayPalRestCall $restCall
     *    Rest call.
     *
     * @return \PayPal\Api\ReportingTransactions
     *   Reporting transactions response.
     */
    public static function get($params, $apiContext, $restCall = null)
    {
        $json = self::requestTransactions($params, $apiContext, $restCall);
        $reporting_transactions = new ReportingTransactions();
        $reporting_transactions->fromJson($json);
        return $reporting_transactions;
    }

    /**
     * Lists all transactions, making iterating each page.
     *
     * @param array $params
     *   Query parameters.
     * @param \PayPal\Rest\ApiContext $apiContext
     *   Api context.
     * @param \PayPal\Transport\PayPalRestCall $restCall
     *    Rest call.
     *
     * @return \PayPal\Api\ReportingTransactions
     *   Reporting transactions response.
     */
    public static function all($params, $apiContext, $restCall = null)
    {
        $completed = false;
        $params['page'] = 1;
        $reporting_transactions = null;
        while (!$completed) {
            $json = self::requestTransactions($params, $apiContext, $restCall);
            if (empty($reporting_transactions)) {
                $reporting_transactions = new ReportingTransactions();
                $reporting_transactions->fromJson($json);
            } else {
                $json_decode = json_decode($json);
                $transaction_details = array_map(function ($transaction_detail) {
                    $reporting_transaction_detail = new ReportingTransactionDetails();
                    $reporting_transaction_detail->fromJson(json_encode($transaction_detail));
                    return $reporting_transaction_detail;
                }, $json_decode->transaction_details);
                $reporting_transactions->setTransactionDetails($transaction_details);
            }
            $completed = $reporting_transactions->getTotalItems() == count($reporting_transactions->getTransactionDetails());
            $params['page']++;
        }
        return $reporting_transactions;
    }
}
