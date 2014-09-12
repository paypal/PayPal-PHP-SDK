<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\Refund;
use PayPal\Transport\PPRestCall;

/**
 * Class Sale
 *
 * @property string             id
 * @property string             create_time
 * @property string             update_time
 * @property \PayPal\Api\Amount amount
 * @property string             state
 * @property string             parent_payment
 * @property \PayPal\Api\Links  links
 */
class Sale extends PPModel implements IResource
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
     * Amount being collected
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
     * Amount being collected
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set State
     * State of the sale transaction
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
     * State of the sale transaction
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
     * @param int                          $saleId
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return Sale
     * @throws \InvalidArgumentException
     */
    public static function get($saleId, $apiContext = null)
    {
        if (($saleId == null) || (strlen($saleId) <= 0)) {
            throw new \InvalidArgumentException("saleId cannot be null or empty");
        }

        $payLoad = "";

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/sale/$saleId", "GET", $payLoad);

        $ret = new Sale();
        $ret->fromJson($json);

        return $ret;
    }

    /**
     * Refund
     *
     * @param \Paypal\Api\Refund           $refund
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return Refund
     * @throws \InvalidArgumentException
     */
    public function refund($refund, $apiContext = null)
    {
        if ($this->getId() == null) {
            throw new \InvalidArgumentException("Id cannot be null");
        }

        if (($refund == null)) {
            throw new \InvalidArgumentException("refund cannot be null or empty");
        }

        $payLoad = $refund->toJSON();

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/sale/{$this->getId()}/refund", "POST", $payLoad);

        $ret = new Refund();
        $ret->fromJson($json);

        return $ret;
    }
}
