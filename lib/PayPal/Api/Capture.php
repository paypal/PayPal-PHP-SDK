<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\Refund;
use PayPal\Transport\PPRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Capture
 *
 * A capture transaction.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\Amount amount
 * @property bool is_final_capture
 * @property string state
 * @property string parent_payment
 * @property \PayPal\Api\Links links
 */
class Capture extends PPModel implements IResource
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
     * Identifier of the Capture transaction.
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
     * Identifier of the Capture transaction.
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
     * Amount being captured. If no amount is specified, amount is used from the authorization being captured. If amount is same as the amount that's authorized for, the state of the authorization changes to captured. If not, the state of the authorization changes to partially_captured. Alternatively, you could indicate a final capture by seting the is_final_capture flag to true.
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
     * Amount being captured. If no amount is specified, amount is used from the authorization being captured. If amount is same as the amount that's authorized for, the state of the authorization changes to captured. If not, the state of the authorization changes to partially_captured. Alternatively, you could indicate a final capture by seting the is_final_capture flag to true.
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
     * 
     *
     * @param bool $is_final_capture
     * 
     * @return $this
     */
    public function setIsFinalCapture($is_final_capture)
    {
        $this->is_final_capture = $is_final_capture;
        return $this;
    }

    /**
     * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
     *
     * @return bool
     */
    public function getIsFinalCapture()
    {
        return $this->is_final_capture;
    }

    /**
     * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
     *
     * @deprecated Instead use setIsFinalCapture
     *
     * @param bool $is_final_capture
     * @return $this
     */
    public function setIs_final_capture($is_final_capture)
    {
        $this->is_final_capture = $is_final_capture;
        return $this;
    }

    /**
     * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
     * @deprecated Instead use getIsFinalCapture
     *
     * @return bool
     */
    public function getIs_final_capture()
    {
        return $this->is_final_capture;
    }

    /**
     * State of the capture transaction.
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
     * State of the capture transaction.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
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
     * Obtain the Capture transaction resource for the given identifier.
     *
     * @param string $captureId
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Capture
     */
    public static function get($captureId, $apiContext = null)
    {
        ArgumentValidator::validate($captureId, 'captureId');

        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/capture/$captureId", "GET", $payLoad);
        $ret = new Capture();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Creates (and processes) a new Refund Transaction added as a related resource.
     *
     * @param Refund $refund
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Refund
     */
    public function refund($refund, $apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($refund, 'refund');

        $payLoad = $refund->toJSON();
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/capture/{$this->getId()}/refund", "POST", $payLoad);
        $ret = new Refund();
        $ret->fromJson($json);
        return $ret;
    }

}
