<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\CreditCardHistory;
use PayPal\Transport\PPRestCall;

/**
 * Class CreditCard
 *
 * @property string              id
 * @property string              number
 * @property string              type
 * @property int                 expire_month
 * @property int                 expire_year
 * @property string              cvv2
 * @property string              first_name
 * @property string              last_name
 * @property \PayPal\Api\Address billing_address
 * @property string              payer_id
 * @property string              state
 * @property string              valid_until
 * @property \PayPal\Api\Links   links
 */
class CreditCard extends PPModel implements IResource
{
    /**
     * Private Variable
     *
     * @var $credential
     */
    private static $credential;

    /**
     * Set Credential
     *
     * @param $credential
     *
     * @deprecated Pass ApiContext to create/get methods instead
     */
    public static function setCredential($credential)
    {
        self::$credential = $credential;
    }

    /**
     * Set ID
     * ID of the credit card being saved for later use
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
     * Get ID
     * ID of the credit card being saved for later use
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Number
     * Credit Card
     *
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get Number
     * Credit Card
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set Type
     * (eg. Visa, Mastercard, etc)
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get Type
     * (eg. Visa, Mastercard, etc)
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Expire Month
     * (eg. 1 - 12)
     *
     * @param int $expire_month
     *
     * @return $this
     */
    public function setExpireMonth($expire_month)
    {
        $this->expire_month = $expire_month;

        return $this;
    }

    /**
     * Get Expire Month
     * (eg. 1 - 12)
     *
     * @return int
     */
    public function getExpireMonth()
    {
        return $this->expire_month;
    }

    /**
     * Set Expire Month
     * (eg. 1 - 12)
     *
     * @param int $expire_month
     *
     * @deprecated Use setExpireMonth
     *
     * @return $this
     */
    public function setExpire_month($expire_month)
    {
        $this->expire_month = $expire_month;

        return $this;
    }

    /**
     * Get Expire Month
     * (eg. 1 - 12)
     *
     * @deprecated Use getExpireMonth
     *
     * @return int
     */
    public function getExpire_month()
    {
        return $this->expire_month;
    }

    /**
     * Set Expire Year
     * Four Digit
     *
     * @param int $expire_year
     *
     * @return $this
     */
    public function setExpireYear($expire_year)
    {
        $this->expire_year = $expire_year;

        return $this;
    }

    /**
     * Get Expire Year
     * Four Digit
     *
     * @return int
     */
    public function getExpireYear()
    {
        return $this->expire_year;
    }

    /**
     * Set Expire Year
     * Four Digit
     *
     * @param int $expire_year
     *
     * @deprecated Use setExpireYear
     *
     * @return $this
     */
    public function setExpire_year($expire_year)
    {
        $this->expire_year = $expire_year;

        return $this;
    }

    /**
     * Get Expire Year
     * Four Digit
     *
     * @deprecated Use getExpireYear
     *
     * @return int
     */
    public function getExpire_year()
    {
        return $this->expire_year;
    }

    /**
     * Set CVV2
     * Card validation code
     * Only supported when making a Payment but not when saving a credit card for future use
     *
     * @param string $cvv2
     *
     * @return $this
     */
    public function setCvv2($cvv2)
    {
        $this->cvv2 = $cvv2;

        return $this;
    }

    /**
     * Get CVV2
     * Card validation code
     * Only supported when making a Payment but not when saving a credit card for future use
     *
     * @return string
     */
    public function getCvv2()
    {
        return $this->cvv2;
    }

    /**
     * Set First Name
     * Card holder's first name
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
     * Card holder's first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set First Name
     * Card holder's first name
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
     * Card holder's first name
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
     * Card holder's last name
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
     * Card holder's last name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set Last Name
     * Card holder's last name
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
     * Card holder's last name
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
     * Set Billing Address associated with this card
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
     * Billing Address associated with this card
     *
     * @return \PayPal\Api\Address
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Set Billing Address associated with this card
     *
     * @param \PayPal\Api\Address $billing_address
     *
     * @deprecated Use setBillingAddress
     *
     * @return $this
     */
    public function setBilling_address($billing_address)
    {
        $this->billing_address = $billing_address;

        return $this;
    }

    /**
     * Billing Address associated with this card
     *
     * @deprecated Use getBillingAddress
     *
     * @return \PayPal\Api\Address
     */
    public function getBilling_address()
    {
        return $this->billing_address;
    }

    /**
     * Set Payer ID
     * A unique identifier of the payer generated and provided by the facilitator
     * This is required when creating or using a tokenized funding instrument
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
     * A unique identifier of the payer generated and provided by the facilitator
     * This is required when creating or using a tokenized funding instrument
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * Set Payer ID
     * A unique identifier of the payer generated and provided by the facilitator
     * This is required when creating or using a tokenized funding instrument
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
     * A unique identifier of the payer generated and provided by the facilitator
     * This is required when creating or using a tokenized funding instrument
     *
     * @deprecated Use getPayerId
     *
     * @return string
     */
    public function getPayer_id()
    {
        return $this->payer_id;
    }

    /**
     * Set State
     * State of the funding instrument
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get State
     * State of the funding instrument
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set Valid Until
     * Date/Time until this resource can be used fund a payment
     *
     * @param string $valid_until
     *
     * @return $this
     */
    public function setValidUntil($valid_until)
    {
        $this->valid_until = $valid_until;

        return $this;
    }

    /**
     * Get Valid Until
     * Date/Time until this resource can be used fund a payment
     *
     * @return string
     */
    public function getValidUntil()
    {
        return $this->valid_until;
    }

    /**
     * Set Valid Until
     * Date/Time until this resource can be used fund a payment
     *
     * @param string $valid_until
     *
     * @deprecated Use setValidUntil
     *
     * @return $this
     */
    public function setValid_until($valid_until)
    {
        $this->valid_until = $valid_until;

        return $this;
    }

    /**
     * Get Valid Until
     * Date/Time until this resource can be used fund a payment
     *
     * @deprecated Use getValidUntil
     *
     * @return string
     */
    public function getValid_until()
    {
        return $this->valid_until;
    }

    /**
     * Set Links
     *
     * @param \PayPal\Api\Links $links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get Links
     *
     * @return \PayPal\Api\Links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Create
     *
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return $this
     */
    public function create($apiContext = null)
    {
        $payLoad = $this->toJSON();

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/credit-card", "POST", $payLoad);
        $this->fromJson($json);

        return $this;
    }

    /**
     * Get
     *
     * @param int                          $creditCardId
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return CreditCard
     * @throws \InvalidArgumentException
     */
    public static function get($creditCardId, $apiContext = null)
    {
        if (($creditCardId == null) || (strlen($creditCardId) <= 0)) {
            throw new \InvalidArgumentException("creditCardId cannot be null or empty");
        }

        $payLoad = "";

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/credit-card/$creditCardId", "GET", $payLoad);

        $ret = new CreditCard();
        $ret->fromJson($json);

        return $ret;
    }

    /**
     * Delete
     *
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function delete($apiContext = null)
    {
        if ($this->getId() == null) {
            throw new \InvalidArgumentException("Id cannot be null");
        }

        $payLoad = "";

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/credit-card/{$this->getId()}", "DELETE", $payLoad);

        return true;
    }
}
