<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class ExtendedBankAccount
 *
 * A resource representing a bank account that can be used to fund a payment including support for SEPA.
 *
 * @package PayPal\Api
 *
 * @property string mandate_reference_number
 */
class ExtendedBankAccount extends BankAccount 
{
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
