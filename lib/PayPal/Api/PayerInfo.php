<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class PayerInfo
 *
 * @property string              email
 * @property string              first_name
 * @property string              last_name
 * @property string              payer_id
 * @property string              phone
 * @property \PayPal\Api\Address shipping_address
 */
class PayerInfo extends PPModel
{
    /**
     * Set Email
     * Email address representing the Payer
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get Email
     * Email address representing the Payer
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set First Name
     * First Name of the Payer from their PayPal Account
     *
     * @param string $first_name
     *
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get First Name
     * First Name of the Payer from their PayPal Account
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set First Name
     * First Name of the Payer from their PayPal Account
     *
     * @param string $first_name
     *
     * @deprecated Use setFirstName
     *
     * @return $this
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get First Name
     * First Name of the Payer from their PayPal Account
     *
     * @deprecated Use getFirstName
     *
     * @return string
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set Last Name
     * Last Name of the Payer from their PayPal Account
     *
     * @param string $last_name
     *
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get Last Name
     * Last Name of the Payer from their PayPal Account
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set Last Name
     * Last Name of the Payer from their PayPal Account
     *
     * @param string $last_name
     *
     * @deprecated Use setLastName
     *
     * @return $this
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get Last Name
     * Last Name of the Payer from their PayPal Account
     *
     * @deprecated Use getLastName
     *
     * @return string
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set Payer ID
     * PayPal assigned Payer ID
     *
     * @param string $payer_id
     *
     * @return $this
     */
    public function setPayerId($payer_id)
    {
        $this->payer_id = $payer_id;

        return $this;
    }

    /**
     * Get Payer ID
     * PayPal assigned Payer ID
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * Set Payer ID
     * PayPal assigned Payer ID
     *
     * @param string $payer_id
     *
     * @deprecated Use setPayerId
     *
     * @return $this
     */
    public function setPayer_id($payer_id)
    {
        $this->payer_id = $payer_id;

        return $this;
    }

    /**
     * Get Payer ID
     * PayPal assigned Payer ID
     *
     * @deprecated Use setPayerId
     *
     * @return string
     */
    public function getPayer_id()
    {
        return $this->payer_id;
    }

    /**
     * Set Phone
     * Phone number representing the Payer
     *
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get Phone
     * Phone number representing the Payer
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set Shipping Address
     * Shipping address of the Payer from their PayPal Account
     *
     * @param \PayPal\Api\ShippingAddress $shipping_address
     *
     * @return $this
     */
    public function setShippingAddress($shipping_address)
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }

    /**
     * Get Shipping Address
     * Shipping address of the Payer from their PayPal Account
     *
     * @return \PayPal\Api\ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Set Shipping Address
     * Shipping address of the Payer from their PayPal Account
     *
     * @param \PayPal\Api\ShippingAddress $shipping_address
     *
     * @deprecated Use setShippingAddress
     *
     * @return $this
     */
    public function setShipping_address($shipping_address)
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }
    
    /**
     * Get Shipping Address
     * Shipping address of the Payer from their PayPal Account
     *
     * @deprecated Use getShippingAddress
     *
     * @return \PayPal\Api\ShippingAddress
     */
    public function getShipping_address()
    {
        return $this->shipping_address;
    }
}
