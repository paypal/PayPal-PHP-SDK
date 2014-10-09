<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\Capture;
use PayPal\Transport\PPRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Authorization
 *
 * An authorization transaction.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\Amount amount
 * @property string payment_mode
 * @property string state
 * @property string protection_eligibility
 * @property string protection_eligibility_type
 * @property string parent_payment
 * @property string clearing_time
 * @property string valid_until
 * @property \PayPal\Api\Links links
 */
class Authorization extends PPModel implements IResource
{
    /**
     * OAuth Credentials to use for this call
     *
     * @var \PayPal\Auth\OAuthTokenCredential $credential
     */
    protected static $credential;

    /**
     * Sets Credential
     *
     * @deprecated Pass ApiContext to create/get methods instead
     * @param \PayPal\Auth\OAuthTokenCredential $credential
     */
    public static function setCredential($credential)
    {
        self::$credential = $credential;
    }

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
     * Amount being authorized for.
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
     * Amount being authorized for.
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
     * State of the authorization transaction.
     * Valid Values: ["pending", "authorized", "partially_captured", "captured", "expired", "voided"] 
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
     * State of the authorization transaction.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
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
     * Protection Eligibility of the Payer 
     *
     * @deprecated Instead use setProtectionEligibility
     *
     * @param string $protection_eligibility
     * @return $this
     */
    public function setProtection_eligibility($protection_eligibility)
    {
        $this->protection_eligibility = $protection_eligibility;
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
     * Protection Eligibility Type of the Payer 
     *
     * @deprecated Instead use setProtectionEligibilityType
     *
     * @param string $protection_eligibility_type
     * @return $this
     */
    public function setProtection_eligibility_type($protection_eligibility_type)
    {
        $this->protection_eligibility_type = $protection_eligibility_type;
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
        return $this->protection_eligibility_type;
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
     * ID of the Payment resource that this transaction is based on.
     *
     * @deprecated Instead use setParentPayment
     *
     * @param string $parent_payment
     * @return $this
     */
    public function setParent_payment($parent_payment)
    {
        $this->parent_payment = $parent_payment;
        return $this;
    }

    /**
     * ID of the Payment resource that this transaction is based on.
     * @deprecated Instead use getParentPayment
     *
     * @return string
     */
    public function getParent_payment()
    {
        return $this->parent_payment;
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
     * Expected clearing time for eCheck Transactions
     *
     * @deprecated Instead use setClearingTime
     *
     * @param string $clearing_time
     * @return $this
     */
    public function setClearing_time($clearing_time)
    {
        $this->clearing_time = $clearing_time;
        return $this;
    }

    /**
     * Expected clearing time for eCheck Transactions
     * @deprecated Instead use getClearingTime
     *
     * @return string
     */
    public function getClearing_time()
    {
        return $this->clearing_time;
    }

    /**
     * Date/Time until which funds may be captured against this resource.
     * 
     *
     * @param string $valid_until
     * 
     * @return $this
     */
    public function setValidUntil($valid_until)
    {
        $this->valid_until = $valid_until;
        return $this;
    }

    /**
     * Date/Time until which funds may be captured against this resource.
     *
     * @return string
     */
    public function getValidUntil()
    {
        return $this->valid_until;
    }

    /**
     * Date/Time until which funds may be captured against this resource.
     *
     * @deprecated Instead use setValidUntil
     *
     * @param string $valid_until
     * @return $this
     */
    public function setValid_until($valid_until)
    {
        $this->valid_until = $valid_until;
        return $this;
    }

    /**
     * Date/Time until which funds may be captured against this resource.
     * @deprecated Instead use getValidUntil
     *
     * @return string
     */
    public function getValid_until()
    {
        return $this->valid_until;
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

    /**
     * Obtain the Authorization transaction resource for the given identifier.
     *
     * @param string $authorizationId
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Authorization
     */
    public static function get($authorizationId, $apiContext = null)
    {
        ArgumentValidator::validate($authorizationId, 'authorizationId');

        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/authorization/$authorizationId", "GET", $payLoad);
        $ret = new Authorization();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Creates (and processes) a new Capture Transaction added as a related resource.
     *
     * @param Capture $capture
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Capture
     */
    public function capture($capture, $apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($capture, 'capture');

        $payLoad = $capture->toJSON();
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/authorization/{$this->getId()}/capture", "POST", $payLoad);
        $ret = new Capture();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Voids (cancels) an Authorization.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Authorization
     */
    public function void($apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");

        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/authorization/{$this->getId()}/void", "POST", $payLoad);
        $this->fromJson($json);
        return $this;
    }

    /**
     * Reauthorizes an expired Authorization.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Authorization
     */
    public function reauthorize($apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");

        $payLoad = $this->toJSON();
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/authorization/{$this->getId()}/reauthorize", "POST", $payLoad);
        $this->fromJson($json);
        return $this;
    }

}
