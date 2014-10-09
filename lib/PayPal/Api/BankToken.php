<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class BankToken
 *
 * A resource representing a bank that can be used to fund a payment.
 *
 * @package PayPal\Api
 *
 * @property string bank_id
 * @property string external_customer_id
 * @property string mandate_reference_number
 */
class BankToken extends PPModel
{
    /**
     * ID of a previously saved Bank resource using /vault/bank API.
     * 
     *
     * @param string $bank_id
     * 
     * @return $this
     */
    public function setBankId($bank_id)
    {
        $this->bank_id = $bank_id;
        return $this;
    }

    /**
     * ID of a previously saved Bank resource using /vault/bank API.
     *
     * @return string
     */
    public function getBankId()
    {
        return $this->bank_id;
    }

    /**
     * ID of a previously saved Bank resource using /vault/bank API.
     *
     * @deprecated Instead use setBankId
     *
     * @param string $bank_id
     * @return $this
     */
    public function setBank_id($bank_id)
    {
        $this->bank_id = $bank_id;
        return $this;
    }

    /**
     * ID of a previously saved Bank resource using /vault/bank API.
     * @deprecated Instead use getBankId
     *
     * @return string
     */
    public function getBank_id()
    {
        return $this->bank_id;
    }

    /**
     * The unique identifier of the payer used when saving this bank using /vault/bank API.
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
     * The unique identifier of the payer used when saving this bank using /vault/bank API.
     *
     * @return string
     */
    public function getExternalCustomerId()
    {
        return $this->external_customer_id;
    }

    /**
     * The unique identifier of the payer used when saving this bank using /vault/bank API.
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
     * The unique identifier of the payer used when saving this bank using /vault/bank API.
     * @deprecated Instead use getExternalCustomerId
     *
     * @return string
     */
    public function getExternal_customer_id()
    {
        return $this->external_customer_id;
    }

    /**
     * Identifier of the direct debit mandate to validate. Currently supported only for EU bank accounts(SEPA).
     * 
     *
     * @param string $mandate_reference_number
     * 
     * @return $this
     */
    public function setMandateReferenceNumber($mandate_reference_number)
    {
        $this->mandate_reference_number = $mandate_reference_number;
        return $this;
    }

    /**
     * Identifier of the direct debit mandate to validate. Currently supported only for EU bank accounts(SEPA).
     *
     * @return string
     */
    public function getMandateReferenceNumber()
    {
        return $this->mandate_reference_number;
    }

    /**
     * Identifier of the direct debit mandate to validate. Currently supported only for EU bank accounts(SEPA).
     *
     * @deprecated Instead use setMandateReferenceNumber
     *
     * @param string $mandate_reference_number
     * @return $this
     */
    public function setMandate_reference_number($mandate_reference_number)
    {
        $this->mandate_reference_number = $mandate_reference_number;
        return $this;
    }

    /**
     * Identifier of the direct debit mandate to validate. Currently supported only for EU bank accounts(SEPA).
     * @deprecated Instead use getMandateReferenceNumber
     *
     * @return string
     */
    public function getMandate_reference_number()
    {
        return $this->mandate_reference_number;
    }

}
