<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Transport\PPRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class CreditCard
 *
 * A resource representing a credit card that can be used to fund a payment.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string number
 * @property string type
 * @property int expire_month
 * @property int expire_year
 * @property int cvv2
 * @property string first_name
 * @property string last_name
 * @property \PayPal\Api\Address billing_address
 * @property string external_customer_id
 * @property string state
 * @property string valid_until
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\Links links
 */
class CreditCard extends PPModel implements IResource
{
    /**
     * OAuth Credentials to use for this call
     *
     * @var \PayPal\Auth\OAuthTokenCredential $credential
     */
    protected static $credential;

    /**
     * Sets Credential
     *
     * @deprecated Pass ApiContext to create/get methods instead
     * @param \PayPal\Auth\OAuthTokenCredential $credential
     */
    public static function setCredential($credential)
    {
        self::$credential = $credential;
    }

    /**
     * ID of the credit card being saved for later use.
     * 
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
     * ID of the credit card being saved for later use.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Card number.
     * 
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
     * Card number.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Type of the Card (eg. Visa, Mastercard, etc.).
     * 
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
     * Type of the Card (eg. Visa, Mastercard, etc.).
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 2 digit card expiry month.
     * 
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
     * 2 digit card expiry month.
     *
     * @return int
     */
    public function getExpireMonth()
    {
        return $this->expire_month;
    }

    /**
     * 2 digit card expiry month.
     *
     * @deprecated Instead use setExpireMonth
     *
     * @param int $expire_month
     * @return $this
     */
    public function setExpire_month($expire_month)
    {
        $this->expire_month = $expire_month;
        return $this;
    }

    /**
     * 2 digit card expiry month.
     * @deprecated Instead use getExpireMonth
     *
     * @return int
     */
    public function getExpire_month()
    {
        return $this->expire_month;
    }

    /**
     * 4 digit card expiry year
     * 
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
     * 4 digit card expiry year
     *
     * @return int
     */
    public function getExpireYear()
    {
        return $this->expire_year;
    }

    /**
     * 4 digit card expiry year
     *
     * @deprecated Instead use setExpireYear
     *
     * @param int $expire_year
     * @return $this
     */
    public function setExpire_year($expire_year)
    {
        $this->expire_year = $expire_year;
        return $this;
    }

    /**
     * 4 digit card expiry year
     * @deprecated Instead use getExpireYear
     *
     * @return int
     */
    public function getExpire_year()
    {
        return $this->expire_year;
    }

    /**
     * Card validation code. Only supported when making a Payment but not when saving a credit card for future use.
     * 
     *
     * @param int $cvv2
     * 
     * @return $this
     */
    public function setCvv2($cvv2)
    {
        $this->cvv2 = $cvv2;
        return $this;
    }

    /**
     * Card validation code. Only supported when making a Payment but not when saving a credit card for future use.
     *
     * @return int
     */
    public function getCvv2()
    {
        return $this->cvv2;
    }

    /**
     * Card holder's first name.
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
     * Card holder's first name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Card holder's first name.
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
     * Card holder's first name.
     * @deprecated Instead use getFirstName
     *
     * @return string
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Card holder's last name.
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
     * Card holder's last name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Card holder's last name.
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
     * Card holder's last name.
     * @deprecated Instead use getLastName
     *
     * @return string
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Billing Address associated with this card.
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
     * Billing Address associated with this card.
     *
     * @return \PayPal\Api\Address
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Billing Address associated with this card.
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
     * Billing Address associated with this card.
     * @deprecated Instead use getBillingAddress
     *
     * @return \PayPal\Api\Address
     */
    public function getBilling_address()
    {
        return $this->billing_address;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     * 
     *
     * @param string $external_customer_id
     * 
     * @return $this
     */
    public function setExternalCustomerId($external_customer_id)
    {
        $this->external_customer_id = $external_customer_id;
        return $this;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     *
     * @return string
     */
    public function getExternalCustomerId()
    {
        return $this->external_customer_id;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     *
     * @deprecated Instead use setExternalCustomerId
     *
     * @param string $external_customer_id
     * @return $this
     */
    public function setExternal_customer_id($external_customer_id)
    {
        $this->external_customer_id = $external_customer_id;
        return $this;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     * @deprecated Instead use getExternalCustomerId
     *
     * @return string
     */
    public function getExternal_customer_id()
    {
        return $this->external_customer_id;
    }

    /**
     * State of the funding instrument.
     * Valid Values: ["expired", "ok"] 
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
     * State of the funding instrument.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Date/Time until this resource can be used fund a payment.
     * 
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
     * Date/Time until this resource can be used fund a payment.
     *
     * @return string
     */
    public function getValidUntil()
    {
        return $this->valid_until;
    }

    /**
     * Date/Time until this resource can be used fund a payment.
     *
     * @deprecated Instead use setValidUntil
     *
     * @param string $valid_until
     * @return $this
     */
    public function setValid_until($valid_until)
    {
        $this->valid_until = $valid_until;
        return $this;
    }

    /**
     * Date/Time until this resource can be used fund a payment.
     * @deprecated Instead use getValidUntil
     *
     * @return string
     */
    public function getValid_until()
    {
        return $this->valid_until;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     * 
     *
     * @param string $create_time
     * 
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @deprecated Instead use setCreateTime
     *
     * @param string $create_time
     * @return $this
     */
    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     * @deprecated Instead use getCreateTime
     *
     * @return string
     */
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     * 
     *
     * @param string $update_time
     * 
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @deprecated Instead use setUpdateTime
     *
     * @param string $update_time
     * @return $this
     */
    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     * @deprecated Instead use getUpdateTime
     *
     * @return string
     */
    public function getUpdate_time()
    {
        return $this->update_time;
    }

    /**
     * Sets Links
     * 
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
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Creates a new Credit Card Resource (aka Tokenize).
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return CreditCard
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
     * Obtain the Credit Card resource for the given identifier.
     *
     * @param string $creditCardId
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return CreditCard
     */
    public static function get($creditCardId, $apiContext = null)
    {
        ArgumentValidator::validate($creditCardId, 'creditCardId');

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
     * Delete the Credit Card resource for the given identifier.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return bool
     */
    public function delete($apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");

        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/credit-card/{$this->getId()}", "DELETE", $payLoad);
        return true;
    }

    /**
     * Update information in a previously saved card. Only the modified fields need to be passed in the request.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return CreditCard
     */
    public function update($apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");

        $payLoad = $this->toJSON();
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/credit-card/{$this->getId()}", "PATCH", $payLoad);
        $this->fromJson($json);
        return $this;
    }

}
