<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Transport\PPRestCall;

/**
 * Class Refund
 *
 * @property string             id
 * @property string             create_time
 * @property \PayPal\Api\Amount amount
 * @property string             state
 * @property string             sale_id
 * @property string             capture_id
 * @property string             parent_payment
 * @property \PayPal\Api\Links  links
 */
class Refund extends PPModel implements IResource
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
     * Identifier of the refund transaction
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
     * Identifier of the refund transaction
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
     * Set Amount
     * Details including both refunded amount (to Payer) and refunded fee (to Payee)
     * If amount is not specified, it's assumed to be full refund
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
     * Details including both refunded amount (to Payer) and refunded fee (to Payee)
     * If amount is not specified, it's assumed to be full refund
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set State
     * State of the refund transaction
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
     * State of the refund transaction
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set Sale ID
     * ID of the Sale transaction being refunded
     *
     * @param string $sale_id
     *
     * @return $this
     */
    public function setSaleId($sale_id)
    {
        $this->sale_id = $sale_id;

        return $this;
    }

    /**
     * Get Sale ID
     * ID of the Sale transaction being refunded
     *
     * @return string
     */
    public function getSaleId()
    {
        return $this->sale_id;
    }

    /**
     * Set Sale ID
     * ID of the Sale transaction being refunded
     *
     * @param string $sale_id
     *
     * @deprecated Use setSaleId
     *
     * @return $this
     */
    public function setSale_id($sale_id)
    {
        $this->sale_id = $sale_id;

        return $this;
    }

    /**
     * Get Sale ID
     * ID of the Sale transaction being refunded
     *
     * @deprecated Use getSaleId
     *
     * @return string
     */
    public function getSale_id()
    {
        return $this->sale_id;
    }

    /**
     * Set Capture ID
     * ID of the Capture transaction being refunded
     *
     * @param string $capture_id
     *
     * @return $this
     */
    public function setCaptureId($capture_id)
    {
        $this->capture_id = $capture_id;

        return $this;
    }

    /**
     * Get Capture ID
     * ID of the Capture transaction being refunded
     *
     * @return string
     */
    public function getCaptureId()
    {
        return $this->capture_id;
    }

    /**
     * Set Capture ID
     * ID of the Capture transaction being refunded
     *
     * @param string $capture_id
     *
     * @deprecated Use setCaptureId
     *
     * @return $this
     */
    public function setCapture_id($capture_id)
    {
        $this->capture_id = $capture_id;

        return $this;
    }

    /**
     * Get Capture ID
     * ID of the Capture transaction being refunded
     *
     * @deprecated Use getCaptureId
     *
     * @return string
     */
    public function getCapture_id()
    {
        return $this->capture_id;
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
     * @param      $refundId
     * @param null $apiContext
     *
     * @return Refund
     * @throws \InvalidArgumentException
     */
    public static function get($refundId, $apiContext = null)
    {
        if (($refundId == null) || (strlen($refundId) <= 0)) {
            throw new \InvalidArgumentException("refundId cannot be null or empty");
        }

        $payLoad = "";

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/refund/$refundId", "GET", $payLoad);

        $ret = new Refund();
        $ret->fromJson($json);

        return $ret;
    }
}
