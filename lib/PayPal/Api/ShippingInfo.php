<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class ShippingInfo extends PPModel
{
    /**
     * First name of the invoice recipient. 30 characters max.
     *
     * @param string $first_name
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
     * @param string $first_name
     * @deprecated. Instead use setFirstName
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * First name of the invoice recipient. 30 characters max.
     *
     * @return string
     * @deprecated. Instead use getFirstName
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Last name of the invoice recipient. 30 characters max.
     *
     * @param string $last_name
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
     * @param string $last_name
     * @deprecated. Instead use setLastName
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Last name of the invoice recipient. 30 characters max.
     *
     * @return string
     * @deprecated. Instead use getLastName
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Company business name of the invoice recipient. 100 characters max.
     *
     * @param string $business_name
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
     * @param string $business_name
     * @deprecated. Instead use setBusinessName
     */
    public function setBusiness_name($business_name)
    {
        $this->business_name = $business_name;
        return $this;
    }

    /**
     * Company business name of the invoice recipient. 100 characters max.
     *
     * @return string
     * @deprecated. Instead use getBusinessName
     */
    public function getBusiness_name()
    {
        return $this->business_name;
    }

    /**
     *
     *
     * @param PayPal\Api\Phone $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     *
     *
     * @return PayPal\Api\Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * Address of the invoice recipient.
     *
     * @param PayPal\Api\Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Address of the invoice recipient.
     *
     * @return PayPal\Api\Address
     */
    public function getAddress()
    {
        return $this->address;
    }


}
