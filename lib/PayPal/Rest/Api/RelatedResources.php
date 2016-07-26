<?php

namespace PayPal\Rest\Api;

use PayPal\Rest\Common\PayPalModel;

/**
 * Class RelatedResources
 *
 * Each one representing a financial transaction (Sale, Authorization, Capture, Refund) related to the payment.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Rest\Api\Sale          sale
 * @property \PayPal\Rest\Api\Authorization authorization
 * @property \PayPal\Rest\Api\Order         order
 * @property \PayPal\Rest\Api\Capture       capture
 * @property \PayPal\Rest\Api\Refund        refund
 */
class RelatedResources extends PayPalModel
{
    /**
     * Sale transaction
     *
     * @param \PayPal\Rest\Api\Sale $sale
     *
     * @return $this
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
        return $this;
    }

    /**
     * Sale transaction
     *
     * @return \PayPal\Rest\Api\Sale
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Authorization transaction
     *
     * @param \PayPal\Rest\Api\Authorization $authorization
     *
     * @return $this
     */
    public function setAuthorization($authorization)
    {
        $this->authorization = $authorization;
        return $this;
    }

    /**
     * Authorization transaction
     *
     * @return \PayPal\Rest\Api\Authorization
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * Order transaction
     *
     * @param \PayPal\Rest\Api\Order $order
     *
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Order transaction
     *
     * @return \PayPal\Rest\Api\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Capture transaction
     *
     * @param \PayPal\Rest\Api\Capture $capture
     *
     * @return $this
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
        return $this;
    }

    /**
     * Capture transaction
     *
     * @return \PayPal\Rest\Api\Capture
     */
    public function getCapture()
    {
        return $this->capture;
    }

    /**
     * Refund transaction
     *
     * @param \PayPal\Rest\Api\Refund $refund
     *
     * @return $this
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;
        return $this;
    }

    /**
     * Refund transaction
     *
     * @return \PayPal\Rest\Api\Refund
     */
    public function getRefund()
    {
        return $this->refund;
    }

}
