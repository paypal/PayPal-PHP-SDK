<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class PayerInfo
 *
 * A resource representing a information about Payer.
 *
 * @package PayPal\Api
 *
 * @property string email
 * @property string external_remember_me_id
 * @property string buyer_account_number
 * @property string first_name
 * @property string last_name
 * @property string payer_id
 * @property string phone
 * @property string phone_type
 * @property string birth_date
 * @property string tax_id
 * @property string tax_id_type
 * @property \PayPal\Api\Address billing_address
 * @property \PayPal\Api\ShippingAddress shipping_address
 */
class PayerInfo extends PPModel
{
    /**
     * Email address representing the Payer.
     * 
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
     * Email address representing the Payer.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * External Remember Me id representing the Payer
     * 
     *
     * @param string $external_remember_me_id
     * 
     * @return $this
     */
    public function setExternalRememberMeId($external_remember_me_id)
    {
        $this->external_remember_me_id = $external_remember_me_id;
        return $this;
    }

    /**
     * External Remember Me id representing the Payer
     *
     * @return string
     */
    public function getExternalRememberMeId()
    {
        return $this->external_remember_me_id;
    }

    /**
     * External Remember Me id representing the Payer
     *
     * @deprecated Instead use setExternalRememberMeId
     *
     * @param string $external_remember_me_id
     * @return $this
     */
    public function setExternal_remember_me_id($external_remember_me_id)
    {
        $this->external_remember_me_id = $external_remember_me_id;
        return $this;
    }

    /**
     * External Remember Me id representing the Payer
     * @deprecated Instead use getExternalRememberMeId
     *
     * @return string
     */
    public function getExternal_remember_me_id()
    {
        return $this->external_remember_me_id;
    }

    /**
     * Account Number representing the Payer
     * 
     *
     * @param string $buyer_account_number
     * 
     * @return $this
     */
    public function setBuyerAccountNumber($buyer_account_number)
    {
        $this->buyer_account_number = $buyer_account_number;
        return $this;
    }

    /**
     * Account Number representing the Payer
     *
     * @return string
     */
    public function getBuyerAccountNumber()
    {
        return $this->buyer_account_number;
    }

    /**
     * Account Number representing the Payer
     *
     * @deprecated Instead use setBuyerAccountNumber
     *
     * @param string $buyer_account_number
     * @return $this
     */
    public function setBuyer_account_number($buyer_account_number)
    {
        $this->buyer_account_number = $buyer_account_number;
        return $this;
    }

    /**
     * Account Number representing the Payer
     * @deprecated Instead use getBuyerAccountNumber
     *
     * @return string
     */
    public function getBuyer_account_number()
    {
        return $this->buyer_account_number;
    }

    /**
     * First Name of the Payer.
     * 
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
     * First Name of the Payer.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * First Name of the Payer.
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
     * First Name of the Payer.
     * @deprecated Instead use getFirstName
     *
     * @return string
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Last Name of the Payer.
     * 
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
     * Last Name of the Payer.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Last Name of the Payer.
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
     * Last Name of the Payer.
     * @deprecated Instead use getLastName
     *
     * @return string
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * PayPal assigned Payer ID.
     * 
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
     * PayPal assigned Payer ID.
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * PayPal assigned Payer ID.
     *
     * @deprecated Instead use setPayerId
     *
     * @param string $payer_id
     * @return $this
     */
    public function setPayer_id($payer_id)
    {
        $this->payer_id = $payer_id;
        return $this;
    }

    /**
     * PayPal assigned Payer ID.
     * @deprecated Instead use getPayerId
     *
     * @return string
     */
    public function getPayer_id()
    {
        return $this->payer_id;
    }

    /**
     * Phone number representing the Payer.
     * 
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
     * Phone number representing the Payer.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Phone type
     * Valid Values: ["HOME", "WORK", "MOBILE", "OTHER"] 
     *
     * @param string $phone_type
     * 
     * @return $this
     */
    public function setPhoneType($phone_type)
    {
        $this->phone_type = $phone_type;
        return $this;
    }

    /**
     * Phone type
     *
     * @return string
     */
    public function getPhoneType()
    {
        return $this->phone_type;
    }

    /**
     * Phone type
     *
     * @deprecated Instead use setPhoneType
     *
     * @param string $phone_type
     * @return $this
     */
    public function setPhone_type($phone_type)
    {
        $this->phone_type = $phone_type;
        return $this;
    }

    /**
     * Phone type
     * @deprecated Instead use getPhoneType
     *
     * @return string
     */
    public function getPhone_type()
    {
        return $this->phone_type;
    }

    /**
     * Birth date of the Payer in ISO8601 format (YYYY-MM-DD).
     * 
     *
     * @param string $birth_date
     * 
     * @return $this
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
        return $this;
    }

    /**
     * Birth date of the Payer in ISO8601 format (YYYY-MM-DD).
     *
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Birth date of the Payer in ISO8601 format (YYYY-MM-DD).
     *
     * @deprecated Instead use setBirthDate
     *
     * @param string $birth_date
     * @return $this
     */
    public function setBirth_date($birth_date)
    {
        $this->birth_date = $birth_date;
        return $this;
    }

    /**
     * Birth date of the Payer in ISO8601 format (YYYY-MM-DD).
     * @deprecated Instead use getBirthDate
     *
     * @return string
     */
    public function getBirth_date()
    {
        return $this->birth_date;
    }

    /**
     * Payer's tax ID.
     * 
     *
     * @param string $tax_id
     * 
     * @return $this
     */
    public function setTaxId($tax_id)
    {
        $this->tax_id = $tax_id;
        return $this;
    }

    /**
     * Payer's tax ID.
     *
     * @return string
     */
    public function getTaxId()
    {
        return $this->tax_id;
    }

    /**
     * Payer's tax ID.
     *
     * @deprecated Instead use setTaxId
     *
     * @param string $tax_id
     * @return $this
     */
    public function setTax_id($tax_id)
    {
        $this->tax_id = $tax_id;
        return $this;
    }

    /**
     * Payer's tax ID.
     * @deprecated Instead use getTaxId
     *
     * @return string
     */
    public function getTax_id()
    {
        return $this->tax_id;
    }

    /**
     * Payer's tax ID type.
     * Valid Values: ["BR_CPF", "BR_CNPJ"] 
     *
     * @param string $tax_id_type
     * 
     * @return $this
     */
    public function setTaxIdType($tax_id_type)
    {
        $this->tax_id_type = $tax_id_type;
        return $this;
    }

    /**
     * Payer's tax ID type.
     *
     * @return string
     */
    public function getTaxIdType()
    {
        return $this->tax_id_type;
    }

    /**
     * Payer's tax ID type.
     *
     * @deprecated Instead use setTaxIdType
     *
     * @param string $tax_id_type
     * @return $this
     */
    public function setTax_id_type($tax_id_type)
    {
        $this->tax_id_type = $tax_id_type;
        return $this;
    }

    /**
     * Payer's tax ID type.
     * @deprecated Instead use getTaxIdType
     *
     * @return string
     */
    public function getTax_id_type()
    {
        return $this->tax_id_type;
    }

    /**
     * Billing address of the Payer.
     * 
     *
     * @param \PayPal\Api\Address $billing_address
     * 
     * @return $this
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = $billing_address;
        return $this;
    }

    /**
     * Billing address of the Payer.
     *
     * @return \PayPal\Api\Address
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Billing address of the Payer.
     *
     * @deprecated Instead use setBillingAddress
     *
     * @param \PayPal\Api\Address $billing_address
     * @return $this
     */
    public function setBilling_address($billing_address)
    {
        $this->billing_address = $billing_address;
        return $this;
    }

    /**
     * Billing address of the Payer.
     * @deprecated Instead use getBillingAddress
     *
     * @return \PayPal\Api\Address
     */
    public function getBilling_address()
    {
        return $this->billing_address;
    }

    /**
     * Obsolete. Use shipping address present in purchase unit.
     * 
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
     * Obsolete. Use shipping address present in purchase unit.
     *
     * @return \PayPal\Api\ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Obsolete. Use shipping address present in purchase unit.
     *
     * @deprecated Instead use setShippingAddress
     *
     * @param \PayPal\Api\ShippingAddress $shipping_address
     * @return $this
     */
    public function setShipping_address($shipping_address)
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    /**
     * Obsolete. Use shipping address present in purchase unit.
     * @deprecated Instead use getShippingAddress
     *
     * @return \PayPal\Api\ShippingAddress
     */
    public function getShipping_address()
    {
        return $this->shipping_address;
    }

}
