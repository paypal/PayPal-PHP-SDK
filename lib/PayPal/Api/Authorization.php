<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\Capture;
use PayPal\Transport\PPRestCall;

/**
 * Class Authorization
 *
 * @property string             id
 * @property string             create_time
 * @property string             update_time
 * @property \PayPal\Api\Amount amount
 * @property string             state
 * @property string             parent_payment
 * @property string             valid_until
 * @property \PayPal\Api\Links  links
 */
class Authorization extends PPModel implements IResource
{
    /**
     * @var
     */
    private static $credential;

    /**
     * Set Credential
     *
     * @param $credential
     *
     * @deprecated Pass ApiContext to create/get methods instead
     */
    public static function setCredential($credential)
    {
        self::$credential = $credential;
    }

    /**
     * Set ID
     * Identifier of the authorization transaction
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
     * Get ID
     * Identifier of the authorization transaction
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Create Time
     * Time the resource was created
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
     * Get Create Time
     * Time the resource was created
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set Create Time
     * Time the resource was created
     *
     * @param string $create_time
     *
     * @deprecated Use setCreateTime
     *
     * @return $this
     */
    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;

        return $this;
    }

    /**
     * Get Create Time
     * Time the resource was created
     *
     * @deprecated Use getCreateTime
     *
     * @return string
     */
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Set Update Time
     * Time the resource was last updated
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
     * Get Update Time
     * Time the resource was last updated
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Set Update Time
     * Time the resource was last updated
     *
     * @param string $update_time
     *
     * @deprecated Use setUpdateTime
     *
     * @return $this
     */
    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;

        return $this;
    }

    /**
     * Get Update Time
     * Time the resource was last updated
     *
     * @deprecated Use getUpdateTime
     *
     * @return string
     */
    public function getUpdate_time()
    {
        return $this->update_time;
    }

    /**
     * Set Amount
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
     * Get Amount
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set State
     * State of the authorization transaction
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
     * Get State
     * State of the authorization transaction
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set Parent Payment
     * ID of the Payment resource that this transaction is based on
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
     * Get Parent Payment
     * ID of the Payment resource that this transaction is based on
     *
     * @return string
     */
    public function getParentPayment()
    {
        return $this->parent_payment;
    }

    /**
     * Set Parent Payment
     * ID of the Payment resource that this transaction is based on
     *
     * @param string $parent_payment
     *
     * @deprecated Use setParentPayment
     *
     * @return $this
     */
    public function setParent_payment($parent_payment)
    {
        $this->parent_payment = $parent_payment;

        return $this;
    }

    /**
     * Get Parent Payment
     * ID of the Payment resource that this transaction is based on
     *
     * @deprecated Use getParentPayment
     *
     * @return string
     */
    public function getParent_payment()
    {
        return $this->parent_payment;
    }

    /**
     * Set Valid Until
     * Date/Time until which funds may be captured against this resource
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
     * Get Valid Until
     * Date/Time until which funds may be captured against this resource
     *
     * @return string
     */
    public function getValidUntil()
    {
        return $this->valid_until;
    }

    /**
     * Set Valid Until
     * Date/Time until which funds may be captured against this resource
     *
     * @param string $valid_until
     *
     * @deprecated Use setValidUntil
     *
     * @return $this
     */
    public function setValid_until($valid_until)
    {
        $this->valid_until = $valid_until;

        return $this;
    }

    /**
     * Get Valid Until
     * Date/Time until which funds may be captured against this resource
     *
     * @deprecated Use getValidUntil
     *
     * @return string
     */
    public function getValid_until()
    {
        return $this->valid_until;
    }

    /**
     * Set Links
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
     * Get Links
     *
     * @return \PayPal\Api\Links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Get
     *
     * @param int                          $authorizationId
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return Authorization
     * @throws \InvalidArgumentException
     */
    public static function get($authorizationId, $apiContext = null)
    {
        if (($authorizationId == null) || (strlen($authorizationId) <= 0)) {
            throw new \InvalidArgumentException("authorizationId cannot be null or empty");
        }

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
     * Capture
     *
     * @param \Paypal\Api\Capture          $capture
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return Capture
     * @throws \InvalidArgumentException
     */
    public function capture($capture, $apiContext = null)
    {
        if ($this->getId() == null) {
            throw new \InvalidArgumentException("Id cannot be null");
        }

        if (($capture == null)) {
            throw new \InvalidArgumentException("capture cannot be null or empty");
        }

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
     * Void
     *
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return Authorization
     * @throws \InvalidArgumentException
     */
    public function void($apiContext = null)
    {
        if ($this->getId() == null) {
            throw new \InvalidArgumentException("Id cannot be null");
        }

        $payLoad = "";

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/authorization/{$this->getId()}/void", "POST", $payLoad);

        $ret = new Authorization();
        $ret->fromJson($json);

        return $ret;
    }

    /**
     * Reauthorize
     *
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function reauthorize($apiContext = null)
    {
        if ($this->getId() == null) {
            throw new \InvalidArgumentException("Id cannot be null");
        }

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
