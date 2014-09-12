<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Payee
 *
 * @property string email
 * @property string merchant_id
 * @property string phone
 */
class Payee extends PPModel
{
    /**
     * Set Email
     * Email Address associated with the Payee's PayPal Account
     * If the provided email address is not associated with any PayPal Account, the payee can only receiver PayPal Wallet Payments
     * Direct Credit Card Payments will be denied due to card compliance requirements
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
     * Email Address associated with the Payee's PayPal Account
     * If the provided email address is not associated with any PayPal Account, the payee can only receiver PayPal Wallet Payments
     * Direct Credit Card Payments will be denied due to card compliance requirements
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set Merchant ID
     * Encrypted PayPal Account identifier for the Payee
     *
     * @param string $merchant_id
     *
     * @return $this
     */
    public function setMerchantId($merchant_id)
    {
        $this->merchant_id = $merchant_id;
        return $this;
    }

    /**
     * Get Merchant ID
     * Encrypted PayPal Account identifier for the Payee
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    /**
     * Set Merchant ID
     * Encrypted PayPal Account identifier for the Payee
     *
     * @param string $merchant_id
     *
     * @deprecated Use setMerchantId
     *
     * @return $this
     */
    public function setMerchant_id($merchant_id)
    {
        $this->merchant_id = $merchant_id;

        return $this;
    }

    /**
     * Get Merchant ID
     * Encrypted PayPal Account identifier for the Payee
     *
     * @deprecated Use getMerchantId
     *
     * @return string
     */
    public function getMerchant_id()
    {
        return $this->merchant_id;
    }

    /**
     * Set Phone
     * (in E.123 format) associated with the Payee's PayPal Account
     * If the provided phont number is not associated with any PayPal Account, the payee can only receiver PayPal Wallet Payments
     * Direct Credit Card Payments will be denied due to card compliance requirements
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
     * (in E.123 format) associated with the Payee's PayPal Account
     * If the provided phont number is not associated with any PayPal Account, the payee can only receiver PayPal Wallet Payments
     * Direct Credit Card Payments will be denied due to card compliance requirements
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
