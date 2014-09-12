<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Details
 *
 * @property string shipping
 * @property string subtotal
 * @property string tax
 * @property string fee
 */
class Details extends PPModel
{
    /**
     * Set Shipping
     * Amount being charged for shipping
     *
     * @param string $shipping
     *
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Get Shipping
     * Amount being charged for shipping
     *
     * @return string
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set Subtotal
     * Sub-total (amount) of items being paid for
     *
     * @param string $subtotal
     *
     * @return $this
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * Get Subtotal
     * Sub-total (amount) of items being paid for
     *
     * @return string
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set Tax
     * Amount being charged as tax
     *
     * @param string $tax
     *
     * @return $this
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Get Tax
     * Amount being charged as tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set Fee
     * Fee charged by PayPal
     * In case of a refund, this is the fee amount refunded to the original receipient of the payment
     *
     * @param string $fee
     *
     * @return $this
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
        return $this;
    }

    /**
     * Get Fee
     * Fee charged by PayPal
     * In case of a refund, this is the fee amount refunded to the original receipient of the payment
     *
     * @return string
     */
    public function getFee()
    {
        return $this->fee;
    }
}
