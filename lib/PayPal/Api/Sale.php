<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Api\Refund;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Sale
 *
 * A sale transaction.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\Amount amount
 * @property string payment_mode
 * @property string pending_reason
 * @property string state
 * @property string reason_code
 * @property string protection_eligibility
 * @property string protection_eligibility_type
 * @property string clearing_time
 * @property string parent_payment
 */
class Sale extends PayPalResourceModel
{
    /**
     * Identifier of the authorization transaction.
     * 
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
     * Identifier of the authorization transaction.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Time the resource was created.
     * 
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
     * Time the resource was created.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was last updated.
     * 
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
     * Time the resource was last updated.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Amount being collected.
     * 
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
     * Amount being collected.
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * specifies payment mode of the transaction
     * Valid Values: ["INSTANT_TRANSFER", "MANUAL_BANK_TRANSFER", "DELAYED_TRANSFER", "ECHECK"] 
     *
     * @param string $payment_mode
     * 
     * @return $this
     */
    public function setPaymentMode($payment_mode)
    {
        $this->payment_mode = $payment_mode;
        return $this;
    }

    /**
     * specifies payment mode of the transaction
     *
     * @return string
     */
    public function getPaymentMode()
    {
        return $this->payment_mode;
    }

    /**
     * Reason of Pending transaction.
     * 
     *
     * @param string $pending_reason
     * 
     * @return $this
     */
    public function setPendingReason($pending_reason)
    {
        $this->pending_reason = $pending_reason;
        return $this;
    }

    /**
     * Reason of Pending transaction.
     *
     * @return string
     */
    public function getPendingReason()
    {
        return $this->pending_reason;
    }

    /**
     * State of the sale transaction.
     * Valid Values: ["pending", "completed", "refunded", "partially_refunded"] 
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
     * State of the sale transaction.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Reason code for the transaction state being Pending or Reversed.
     * Valid Values: ["CHARGEBACK", "GUARANTEE", "BUYER_COMPLAINT", "REFUND", "UNCONFIRMED_SHIPPING_ADDRESS", "ECHECK", "INTERNATIONAL_WITHDRAWAL", "RECEIVING_PREFERENCE_MANDATES_MANUAL_ACTION", "PAYMENT_REVIEW", "REGULATORY_REVIEW", "UNILATERAL", "VERIFICATION_REQUIRED"] 
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
     * Reason code for the transaction state being Pending or Reversed.
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }

    /**
     * Protection Eligibility of the Payer 
     * Valid Values: ["ELIGIBLE", "PARTIALLY_ELIGIBLE", "INELIGIBLE"] 
     *
     * @param string $protection_eligibility
     * 
     * @return $this
     */
    public function setProtectionEligibility($protection_eligibility)
    {
        $this->protection_eligibility = $protection_eligibility;
        return $this;
    }

    /**
     * Protection Eligibility of the Payer 
     *
     * @return string
     */
    public function getProtectionEligibility()
    {
        return $this->protection_eligibility;
    }

    /**
     * Protection Eligibility Type of the Payer 
     * Valid Values: ["ELIGIBLE", "ITEM_NOT_RECEIVED_ELIGIBLE", "INELIGIBLE", "UNAUTHORIZED_PAYMENT_ELIGIBLE"] 
     *
     * @param string $protection_eligibility_type
     * 
     * @return $this
     */
    public function setProtectionEligibilityType($protection_eligibility_type)
    {
        $this->protection_eligibility_type = $protection_eligibility_type;
        return $this;
    }

    /**
     * Protection Eligibility Type of the Payer 
     *
     * @return string
     */
    public function getProtectionEligibilityType()
    {
        return $this->protection_eligibility_type;
    }

    /**
     * Expected clearing time for eCheck Transactions
     * 
     *
     * @param string $clearing_time
     * 
     * @return $this
     */
    public function setClearingTime($clearing_time)
    {
        $this->clearing_time = $clearing_time;
        return $this;
    }

    /**
     * Expected clearing time for eCheck Transactions
     *
     * @return string
     */
    public function getClearingTime()
    {
        return $this->clearing_time;
    }

    /**
     * ID of the Payment resource that this transaction is based on.
     * 
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
     * ID of the Payment resource that this transaction is based on.
     *
     * @return string
     */
    public function getParentPayment()
    {
        return $this->parent_payment;
    }

    /**
     * Obtain the Sale transaction resource for the given identifier.
     *
     * @param string $saleId
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Sale
     */
    public static function get($saleId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($saleId, 'saleId');

        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/sale/$saleId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Sale();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Creates (and processes) a new Refund Transaction added as a related resource.
     *
     * @param Refund $refund
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Refund
     */
    public function refund($refund, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($refund, 'refund');

        $payLoad = $refund->toJSON();
        $json = self::executeCall(
            "/v1/payments/sale/{$this->getId()}/refund",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Refund();
        $ret->fromJson($json);
        return $ret;
    }

}
