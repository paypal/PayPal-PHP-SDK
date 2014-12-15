<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class ShippingInfo
 *
 * Shipping information for the invoice recipient.
 *
 * @package PayPal\Api
 *
 * @property string first_name
 * @property string last_name
 * @property string business_name
 * @property \PayPal\Api\Phone phone
 * @property \PayPal\Api\InvoiceAddress address
 */
class ShippingInfo extends PPModel
{
    /**
     * First name of the invoice recipient. 30 characters max.
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
     * First name of the invoice recipient. 30 characters max.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * First name of the invoice recipient. 30 characters max.
     *
     * @deprecated Instead use setFirstName
     *
     * @param string $first_name
     * @return $this
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * First name of the invoice recipient. 30 characters max.
     * @deprecated Instead use getFirstName
     *
     * @return string
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Last name of the invoice recipient. 30 characters max.
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
     * Last name of the invoice recipient. 30 characters max.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Last name of the invoice recipient. 30 characters max.
     *
     * @deprecated Instead use setLastName
     *
     * @param string $last_name
     * @return $this
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Last name of the invoice recipient. 30 characters max.
     * @deprecated Instead use getLastName
     *
     * @return string
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Company business name of the invoice recipient. 100 characters max.
     *
     * @param string $business_name
     * 
     * @return $this
     */
    public function setBusinessName($business_name)
    {
        $this->business_name = $business_name;
        return $this;
    }

    /**
     * Company business name of the invoice recipient. 100 characters max.
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->business_name;
    }

    /**
     * Company business name of the invoice recipient. 100 characters max.
     *
     * @deprecated Instead use setBusinessName
     *
     * @param string $business_name
     * @return $this
     */
    public function setBusiness_name($business_name)
    {
        $this->business_name = $business_name;
        return $this;
    }

    /**
     * Company business name of the invoice recipient. 100 characters max.
     * @deprecated Instead use getBusinessName
     *
     * @return string
     */
    public function getBusiness_name()
    {
        return $this->business_name;
    }

    /**
     *
     *
     * @param \PayPal\Api\Phone $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     *
     *
     * @return \PayPal\Api\Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Address of the invoice recipient.
     *
     * @param \PayPal\Api\InvoiceAddress $address
     * 
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Address of the invoice recipient.
     *
     * @return \PayPal\Api\InvoiceAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @deprecated This will not be supported soon. Kept for backward Compatibility
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @deprecated This will not be supported soon. Kept for backward Compatibility
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

}
