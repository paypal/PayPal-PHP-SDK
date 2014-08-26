<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class RelatedResources
 *
 * @property \PayPal\Api\Sale          sale
 * @property \PayPal\Api\Authorization authorization
 * @property \PayPal\Api\Capture       capture
 * @property \PayPal\Api\Refund        refund
 */
class RelatedResources extends PPModel
{
    /**
     * Set Sale
     * A sale transaction
     *
     * @param \PayPal\Api\Sale $sale
     *
     * @return $this
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
        return $this;
    }

    /**
     * Get Sale
     * A sale transaction
     *
     * @return \PayPal\Api\Sale
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Set Authorization
     * An authorization transaction
     *
     * @param \PayPal\Api\Authorization $authorization
     *
     * @return $this
     */
    public function setAuthorization($authorization)
    {
        $this->authorization = $authorization;
        return $this;
    }

    /**
     * Get Authorization
     * An authorization transaction
     *
     * @return \PayPal\Api\Authorization
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * Set Capture
     * A capture transaction
     *
     * @param \PayPal\Api\Capture $capture
     *
     * @return $this
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
        return $this;
    }

    /**
     * Get Capture
     * A capture transaction
     *
     * @return \PayPal\Api\Capture
     */
    public function getCapture()
    {
        return $this->capture;
    }

    /**
     * Set Refund
     * A refund transaction
     *
     * @param \PayPal\Api\Refund $refund
     *
     * @return $this
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;
        return $this;
    }

    /**
     * Get Refund
     * A refund transaction
     *
     * @return \PayPal\Api\Refund
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * Set Order
     * 
     * @param \PayPal\Api\Order $order
     * 
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get Order
     * 
     * @return \PayPal\Api\Order
     */
    public function getOrder()
    {
        return $this->order;
    }
}
