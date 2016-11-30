<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Core\PayPalConstants;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;

/**
 * Class Presentment
 *
 * Lets you create upfront presentment.
 *
 * @package PayPal\Api
 *
 * @property string                              financing_country_code
 * @property \PayPal\Api\Currency                transaction_amount
 * @property string                              tracking_id
 * @property string                              configuration_owner_account
 * @property bool                                financing_fee_charged_to_separate_account
 * @property \PayPal\Api\FinancingOptions[]      financing_options
 */
class Presentment extends PayPalResourceModel
{
    /**
     * Two-letter registered country code the credit financing options should be calculated for.
     *
     * @param string $financing_country_code
     *
     * @return $this
     */
    public function setFinancingCountryCode($financing_country_code)
    {
        $this->financing_country_code = $financing_country_code;
        return $this;
    }

    /**
     * Two-letter registered country code the credit financing options should be calculated for.
     *
     * @return string
     */
    public function getFinancingCountryCode()
    {
        return $this->financing_country_code;
    }

    /**
     * Transaction Amount details.
     *
     * @param \PayPal\Api\Currency $transaction_amount
     *
     * @return $this
     */
    public function setTransactionAmount($transaction_amount)
    {
        $this->transaction_amount = $transaction_amount;
        return $this;
    }

    /**
     * Transaction Amount details.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTransactionAmount()
    {
        return $this->transaction_amount;
    }

    /**
     * Token of the transaction the credit financing options should be calculated for.
     *
     * @param string $tracking_id
     *
     * @return $this
     */
    public function setTrackingId($tracking_id)
    {
        $this->tracking_id = $id;
        return $this;
    }

    /**
     * Token of the transaction the credit financing options should be calculated for.
     *
     * @return string
     */
    public function getTrackingId()
    {
        return $this->setTrackingId;
    }

    /**
     * Configuration owner account
     *
     * @param string $configuration_owner_account
     *
     * @return $this
     */
    public function setConfigurationOwnerAccount($configuration_owner_account)
    {
        $this->configuration_owner_account = $configuration_owner_account;
        return $this;
    }

    /**
     * Configuration owner account
     *
     * @return string
     */
    public function getConfigurationOwnerAccount()
    {
        return $this->configuration_owner_account;
    }

    /**
     * Financing fee charged to separate account
     *
     * @param bool $financing_fee_charged_to_separate_account
     *
     * @return $this
     */
    public function setFinancingFeeChargedToSeparateAccount($financing_fee_charged_to_separate_account)
    {
        $this->financing_fee_charged_to_separate_account = $financing_fee_charged_to_separate_account;
        return $this;
    }

    /**
     * Financing fee charged to separate account
     *
     * @return bool
     */
    public function getFinancingFeeChargedToSeparateAccount()
    {
        return $this->financing_fee_charged_to_separate_account;
    }

    /**
     * Transactional details including the amount and item details.
     *
     * @param \PayPal\Api\FinancingOption[] $financing_options
     *
     * @return $this
     */
    public function setFinancingOptions($financing_options)
    {
        $this->financing_options = $financing_options;
        return $this;
    }

    /**
     * Transactional details including the amount and item details.
     *
     * @return \PayPal\Api\FinancingOption[]
     */
    public function getFinancingOptions()
    {
        return $this->financing_options;
    }

    /**
     * Append Transactions to the list.
     *
     * @param \PayPal\Api\FinancingOption $financing_options
     * @return $this
     */
    public function addFinancingOptions($financing_options)
    {
        if (!$this->getFinancingOptions()) {
            return $this->setFinancingOptions(array($financing_options));
        } else {
            return $this->setFinancingOptions(
                array_merge($this->getFinancingOptions(), array($financing_options))
            );
        }
    }

    /**
     * Remove Transactions from the list.
     *
     * @param \PayPal\Api\FinancingOption $financing_options
     * @return $this
     */
    public function removeTransaction($financing_options)
    {
        return $this->setFinancingOptions(
            array_diff($this->getFinancingOptions(), array($financing_options))
        );
    }

    /**
     * Create and process a payment by passing a payment object that includes the intent, payer, and transactions in the body of the request JSON. For PayPal payments, include redirect URLs in the payment object.
     *
     * @param ApiContext     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall   is the Rest Call Service that is used to make rest calls
     * @return Payment
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/credit/calculated-financing-options",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

}
