<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Details
 *
 * Additional details of the payment amount.
 *
 * @package PayPal\Api
 *
 * @property string shipping
 * @property string subtotal
 * @property string tax
 * @property string fee
 * @property string shipping_discount
 * @property string insurance
 * @property string handling_fee
 * @property string gift_wrap
 */
class Details extends PPModel
{
    /**
     * Amount being charged for shipping.
     * 
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
     * Amount being charged for shipping.
     *
     * @return string
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Sub-total (amount) of items being paid for.
     * 
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
     * Sub-total (amount) of items being paid for.
     *
     * @return string
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Amount being charged as tax.
     * 
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
     * Amount being charged as tax.
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Fee charged by PayPal. In case of a refund, this is the fee amount refunded to the original receipient of the payment.
     * 
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
     * Fee charged by PayPal. In case of a refund, this is the fee amount refunded to the original receipient of the payment.
     *
     * @return string
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Amount being charged as shipping discount.
     * 
     *
     * @param string $shipping_discount
     * 
     * @return $this
     */
    public function setShippingDiscount($shipping_discount)
    {
        $this->shipping_discount = $shipping_discount;
        return $this;
    }

    /**
     * Amount being charged as shipping discount.
     *
     * @return string
     */
    public function getShippingDiscount()
    {
        return $this->shipping_discount;
    }

    /**
     * Amount being charged as shipping discount.
     *
     * @deprecated Instead use setShippingDiscount
     *
     * @param string $shipping_discount
     * @return $this
     */
    public function setShipping_discount($shipping_discount)
    {
        $this->shipping_discount = $shipping_discount;
        return $this;
    }

    /**
     * Amount being charged as shipping discount.
     * @deprecated Instead use getShippingDiscount
     *
     * @return string
     */
    public function getShipping_discount()
    {
        return $this->shipping_discount;
    }

    /**
     * Amount being charged as insurance.
     * 
     *
     * @param string $insurance
     * 
     * @return $this
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
        return $this;
    }

    /**
     * Amount being charged as insurance.
     *
     * @return string
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * Amount being charged as handling fee.
     * 
     *
     * @param string $handling_fee
     * 
     * @return $this
     */
    public function setHandlingFee($handling_fee)
    {
        $this->handling_fee = $handling_fee;
        return $this;
    }

    /**
     * Amount being charged as handling fee.
     *
     * @return string
     */
    public function getHandlingFee()
    {
        return $this->handling_fee;
    }

    /**
     * Amount being charged as handling fee.
     *
     * @deprecated Instead use setHandlingFee
     *
     * @param string $handling_fee
     * @return $this
     */
    public function setHandling_fee($handling_fee)
    {
        $this->handling_fee = $handling_fee;
        return $this;
    }

    /**
     * Amount being charged as handling fee.
     * @deprecated Instead use getHandlingFee
     *
     * @return string
     */
    public function getHandling_fee()
    {
        return $this->handling_fee;
    }

    /**
     * Amount being charged as gift wrap fee.
     * 
     *
     * @param string $gift_wrap
     * 
     * @return $this
     */
    public function setGiftWrap($gift_wrap)
    {
        $this->gift_wrap = $gift_wrap;
        return $this;
    }

    /**
     * Amount being charged as gift wrap fee.
     *
     * @return string
     */
    public function getGiftWrap()
    {
        return $this->gift_wrap;
    }

    /**
     * Amount being charged as gift wrap fee.
     *
     * @deprecated Instead use setGiftWrap
     *
     * @param string $gift_wrap
     * @return $this
     */
    public function setGift_wrap($gift_wrap)
    {
        $this->gift_wrap = $gift_wrap;
        return $this;
    }

    /**
     * Amount being charged as gift wrap fee.
     * @deprecated Instead use getGiftWrap
     *
     * @return string
     */
    public function getGift_wrap()
    {
        return $this->gift_wrap;
    }

}
