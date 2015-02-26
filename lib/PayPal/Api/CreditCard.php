<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;

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
 * @property string cvv2
 * @property string first_name
 * @property string last_name
 * @property \PayPal\Api\Address billing_address
 * @property string external_customer_id
 * @property string state
 * @property string valid_until
 * @property string create_time
 * @property string update_time
 */
class CreditCard extends PayPalResourceModel
{
    /**
     * ID of the credit card being saved for later use.
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
     * 4 digit card expiry year
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
     * Card validation code. Only supported when making a Payment but not when saving a credit card for future use.
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
     * Card validation code. Only supported when making a Payment but not when saving a credit card for future use.
     *
     * @return string
     */
    public function getCvv2()
    {
        return $this->cvv2;
    }

    /**
     * Card holder's first name.
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
     * Card holder's last name.
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
     * Billing Address associated with this card.
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
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
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
     * Time the resource was created in UTC ISO8601 format.
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
     * Time the resource was created in UTC ISO8601 format.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Creates a new Credit Card Resource (aka Tokenize).
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return CreditCard
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/vault/credit-cards",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Obtain the Credit Card resource for the given identifier.
     *
     * @param string $creditCardId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return CreditCard
     */
    public static function get($creditCardId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($creditCardId, 'creditCardId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/vault/credit-cards/$creditCardId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new CreditCard();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Delete the Credit Card resource for the given identifier.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function delete($apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = "";
        self::executeCall(
            "/v1/vault/credit-cards/{$this->getId()}",
            "DELETE",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Update information in a previously saved card. Only the modified fields need to be passed in the request.
     *
     * @param PatchRequest $patchRequest
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return CreditCard
     */
    public function update($patchRequest, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($patchRequest, 'patch');
        $payload = $patchRequest->toJSON();
        $json = self::executeCall(
            "/v1/vault/credit-cards/{$this->getId()}",
            "PATCH",
            $payload,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

}
