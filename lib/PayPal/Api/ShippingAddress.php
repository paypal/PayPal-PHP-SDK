<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class ShippingAddress
 *
 * Extended Address object used as shipping address in a payment.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string recipient_name
 * @property bool default_address
 */
class ShippingAddress extends Address 
{
    /**
     * Address ID assigned in PayPal system.
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
     * Address ID assigned in PayPal system.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Name of the recipient at this address.
     *
     * @param string $recipient_name
     * 
     * @return $this
     */
    public function setRecipientName($recipient_name)
    {
        $this->recipient_name = $recipient_name;
        return $this;
    }

    /**
     * Name of the recipient at this address.
     *
     * @return string
     */
    public function getRecipientName()
    {
        return $this->recipient_name;
    }

    /**
     * Name of the recipient at this address.
     *
     * @deprecated Instead use setRecipientName
     *
     * @param string $recipient_name
     * @return $this
     */
    public function setRecipient_name($recipient_name)
    {
        $this->recipient_name = $recipient_name;
        return $this;
    }

    /**
     * Name of the recipient at this address.
     * @deprecated Instead use getRecipientName
     *
     * @return string
     */
    public function getRecipient_name()
    {
        return $this->recipient_name;
    }

    /**
     * Default shipping address of the Payer.
     *
     * @param bool $default_address
     * 
     * @return $this
     */
    public function setDefaultAddress($default_address)
    {
        $this->default_address = $default_address;
        return $this;
    }

    /**
     * Default shipping address of the Payer.
     *
     * @return bool
     */
    public function getDefaultAddress()
    {
        return $this->default_address;
    }

    /**
     * Default shipping address of the Payer.
     *
     * @deprecated Instead use setDefaultAddress
     *
     * @param bool $default_address
     * @return $this
     */
    public function setDefault_address($default_address)
    {
        $this->default_address = $default_address;
        return $this;
    }

    /**
     * Default shipping address of the Payer.
     * @deprecated Instead use getDefaultAddress
     *
     * @return bool
     */
    public function getDefault_address()
    {
        return $this->default_address;
    }

}
