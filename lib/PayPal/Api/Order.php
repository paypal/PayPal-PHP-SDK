<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Order
 *
 * An order transaction.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string purchase_unit_reference_id
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\Amount amount
 * @property string payment_mode
 * @property string state
 * @property string reason_code
 * @property string protection_eligibility
 * @property string protection_eligibility_type
 * @property \PayPal\Api\Links links
 */
class Order extends PPModel
{
    /**
     * Identifier of the order transaction.
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
     * Identifier of the order transaction.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Identifier to the purchase unit associated with this object
     * 
     *
     * @param string $purchase_unit_reference_id
     * 
     * @return $this
     */
    public function setPurchaseUnitReferenceId($purchase_unit_reference_id)
    {
        $this->purchase_unit_reference_id = $purchase_unit_reference_id;
        return $this;
    }

    /**
     * Identifier to the purchase unit associated with this object
     *
     * @return string
     */
    public function getPurchaseUnitReferenceId()
    {
        return $this->purchase_unit_reference_id;
    }

    /**
     * Identifier to the purchase unit associated with this object
     *
     * @deprecated Instead use setPurchaseUnitReferenceId
     *
     * @param string $purchase_unit_reference_id
     * @return $this
     */
    public function setPurchase_unit_reference_id($purchase_unit_reference_id)
    {
        $this->purchase_unit_reference_id = $purchase_unit_reference_id;
        return $this;
    }

    /**
     * Identifier to the purchase unit associated with this object
     * @deprecated Instead use getPurchaseUnitReferenceId
     *
     * @return string
     */
    public function getPurchase_unit_reference_id()
    {
        return $this->purchase_unit_reference_id;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
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
     * Time the resource was created in UTC ISO8601 format.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @deprecated Instead use setCreateTime
     *
     * @param string $create_time
     * @return $this
     */
    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     * @deprecated Instead use getCreateTime
     *
     * @return string
     */
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
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
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @deprecated Instead use setUpdateTime
     *
     * @param string $update_time
     * @return $this
     */
    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     * @deprecated Instead use getUpdateTime
     *
     * @return string
     */
    public function getUpdate_time()
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
     * specifies payment mode of the transaction
     *
     * @deprecated Instead use setPaymentMode
     *
     * @param string $payment_mode
     * @return $this
     */
    public function setPayment_mode($payment_mode)
    {
        $this->payment_mode = $payment_mode;
        return $this;
    }

    /**
     * specifies payment mode of the transaction
     * @deprecated Instead use getPaymentMode
     *
     * @return string
     */
    public function getPayment_mode()
    {
        return $this->payment_mode;
    }

    /**
     * State of the order transaction.
     * Valid Values: ["PENDING", "COMPLETED", "REFUNDED", "PARTIALLY_REFUNDED"] 
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
     * State of the order transaction.
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
     * Reason code for the transaction state being Pending or Reversed.
     *
     * @deprecated Instead use setReasonCode
     *
     * @param string $reason_code
     * @return $this
     */
    public function setReason_code($reason_code)
    {
        $this->reason_code = $reason_code;
        return $this;
    }

    /**
     * Reason code for the transaction state being Pending or Reversed.
     * @deprecated Instead use getReasonCode
     *
     * @return string
     */
    public function getReason_code()
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
        $this->{"protection-eligibility"} = $protection_eligibility;
        return $this;
    }

    /**
     * Protection Eligibility of the Payer 
     *
     * @return string
     */
    public function getProtectionEligibility()
    {
        return $this->{"protection-eligibility"};
    }

    /**
     * Protection Eligibility of the Payer 
     *
     * @deprecated Instead use setProtectionEligibility
     *
     * @param string $protection-eligibility
     * @return $this
     */
    public function setProtection_eligibility($protection_eligibility)
    {
        $this->{"protection-eligibility"} = $protection_eligibility;
        return $this;
    }

    /**
     * Protection Eligibility of the Payer 
     * @deprecated Instead use getProtectionEligibility
     *
     * @return string
     */
    public function getProtection_eligibility()
    {
        return $this->{"protection-eligibility"};
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
        $this->{"protection-eligibility_type"} = $protection_eligibility_type;
        return $this;
    }

    /**
     * Protection Eligibility Type of the Payer 
     *
     * @return string
     */
    public function getProtectionEligibilityType()
    {
        return $this->{"protection-eligibility_type"};
    }

    /**
     * Protection Eligibility Type of the Payer 
     *
     * @deprecated Instead use setProtectionEligibilityType
     *
     * @param string $protection-eligibility_type
     * @return $this
     */
    public function setProtection_eligibility_type($protection_eligibility_type)
    {
        $this->{"protection-eligibility_type"} = $protection_eligibility_type;
        return $this;
    }

    /**
     * Protection Eligibility Type of the Payer 
     * @deprecated Instead use getProtectionEligibilityType
     *
     * @return string
     */
    public function getProtection_eligibility_type()
    {
        return $this->{"protection-eligibility_type"};
    }

    /**
     * Sets Links
     * 
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
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

}
