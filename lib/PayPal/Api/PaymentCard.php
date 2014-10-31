<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class PaymentCard
 *
 * A resource representing a payment card that can be used to fund a payment.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string number
 * @property string type
 * @property int expire_month
 * @property int expire_year
 * @property int start_month
 * @property int start_year
 * @property int cvv2
 * @property string first_name
 * @property string last_name
 * @property \PayPal\Api\Address billing_address
 * @property string external_customer_id
 * @property string status
 * @property string valid_until
 * @property \PayPal\Api\Links[] links
 */
class PaymentCard extends PPModel
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
     * Type of the Card.
     * Valid Values: ["VISA", "AMEX", "SOLO", "JCB", "STAR", "DELTA", "DISCOVER", "SWITCH", "MAESTRO", "CB_NATIONALE", "CONFINOGA", "COFIDIS", "ELECTRON", "CETELEM", "CHINA_UNION_PAY", "MASTERCARD"]
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
     * Type of the Card.
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
     * 4 digit card expiry year.
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
     * 4 digit card expiry year.
     *
     * @return int
     */
    public function getExpireYear()
    {
        return $this->expire_year;
    }

    /**
     * 4 digit card expiry year.
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
     * 4 digit card expiry year.
     * @deprecated Instead use getExpireYear
     *
     * @return int
     */
    public function getExpire_year()
    {
        return $this->expire_year;
    }

    /**
     * 2 digit card start month.
     *
     * @param int $start_month
     * 
     * @return $this
     */
    public function setStartMonth($start_month)
    {
        $this->start_month = $start_month;
        return $this;
    }

    /**
     * 2 digit card start month.
     *
     * @return int
     */
    public function getStartMonth()
    {
        return $this->start_month;
    }

    /**
     * 2 digit card start month.
     *
     * @deprecated Instead use setStartMonth
     *
     * @param int $start_month
     * @return $this
     */
    public function setStart_month($start_month)
    {
        $this->start_month = $start_month;
        return $this;
    }

    /**
     * 2 digit card start month.
     * @deprecated Instead use getStartMonth
     *
     * @return int
     */
    public function getStart_month()
    {
        return $this->start_month;
    }

    /**
     * 4 digit card start year.
     *
     * @param int $start_year
     * 
     * @return $this
     */
    public function setStartYear($start_year)
    {
        $this->start_year = $start_year;
        return $this;
    }

    /**
     * 4 digit card start year.
     *
     * @return int
     */
    public function getStartYear()
    {
        return $this->start_year;
    }

    /**
     * 4 digit card start year.
     *
     * @deprecated Instead use setStartYear
     *
     * @param int $start_year
     * @return $this
     */
    public function setStart_year($start_year)
    {
        $this->start_year = $start_year;
        return $this;
    }

    /**
     * 4 digit card start year.
     * @deprecated Instead use getStartYear
     *
     * @return int
     */
    public function getStart_year()
    {
        return $this->start_year;
    }

    /**
     * Card validation code. Only supported when making a Payment, but not when saving a payment card for future use.
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
     * Card validation code. Only supported when making a Payment, but not when saving a payment card for future use.
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
     * A unique identifier of the customer to whom this card account belongs. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
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
     * A unique identifier of the customer to whom this card account belongs. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     *
     * @return string
     */
    public function getExternalCustomerId()
    {
        return $this->external_customer_id;
    }

    /**
     * A unique identifier of the customer to whom this card account belongs. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
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
     * A unique identifier of the customer to whom this card account belongs. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
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
     * Valid Values: ["EXPIRED", "ACTIVE"]
     *
     * @param string $status
     * 
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * State of the funding instrument.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Date/Time until this resource can be used to fund a payment.
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
     * Date/Time until this resource can be used to fund a payment.
     *
     * @return string
     */
    public function getValidUntil()
    {
        return $this->valid_until;
    }

    /**
     * Date/Time until this resource can be used to fund a payment.
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
     * Date/Time until this resource can be used to fund a payment.
     * @deprecated Instead use getValidUntil
     *
     * @return string
     */
    public function getValid_until()
    {
        return $this->valid_until;
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
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
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links)
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links)
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }

}
