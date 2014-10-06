<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class BillingInfo extends PPModel
{
    /**
     * Email address of the invoice recipient. 260 characters max.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Email address of the invoice recipient. 260 characters max.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


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


    /**
     * Language of the email sent to the payer. Will only be used if payer doesn't have a PayPal account.
     *
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Language of the email sent to the payer. Will only be used if payer doesn't have a PayPal account.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }


    /**
     * Option to display additional information such as business hours. 40 characters max.
     *
     * @param string $additional_info
     */
    public function setAdditionalInfo($additional_info)
    {
        $this->additional_info = $additional_info;
        return $this;
    }

    /**
     * Option to display additional information such as business hours. 40 characters max.
     *
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additional_info;
    }

    /**
     * Option to display additional information such as business hours. 40 characters max.
     *
     * @param string $additional_info
     * @deprecated. Instead use setAdditionalInfo
     */
    public function setAdditional_info($additional_info)
    {
        $this->additional_info = $additional_info;
        return $this;
    }

    /**
     * Option to display additional information such as business hours. 40 characters max.
     *
     * @return string
     * @deprecated. Instead use getAdditionalInfo
     */
    public function getAdditional_info()
    {
        return $this->additional_info;
    }

}
