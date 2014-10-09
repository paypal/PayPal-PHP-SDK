<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class CartBase
 *
 * Base properties of a cart resource
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\Amount amount
 * @property \PayPal\Api\Payee payee
 * @property string description
 * @property string note_to_payee
 * @property string custom
 * @property string invoice_number
 * @property string soft_descriptor
 * @property \PayPal\Api\PaymentOptions payment_options
 * @property \PayPal\Api\ItemList item_list
 */
class CartBase extends PPModel
{
    /**
     * Amount being collected.
     * 
     *
     * @param \PayPal\Api\Amount $amount
     * 
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Amount being collected.
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Recipient of the funds in this transaction.
     * 
     *
     * @param \PayPal\Api\Payee $payee
     * 
     * @return $this
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;
        return $this;
    }

    /**
     * Recipient of the funds in this transaction.
     *
     * @return \PayPal\Api\Payee
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * Description of what is being paid for.
     * 
     *
     * @param string $description
     * 
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Description of what is being paid for.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Note to the recipient of the funds in this transaction.
     * 
     *
     * @param string $note_to_payee
     * 
     * @return $this
     */
    public function setNoteToPayee($note_to_payee)
    {
        $this->note_to_payee = $note_to_payee;
        return $this;
    }

    /**
     * Note to the recipient of the funds in this transaction.
     *
     * @return string
     */
    public function getNoteToPayee()
    {
        return $this->note_to_payee;
    }

    /**
     * Note to the recipient of the funds in this transaction.
     *
     * @deprecated Instead use setNoteToPayee
     *
     * @param string $note_to_payee
     * @return $this
     */
    public function setNote_to_payee($note_to_payee)
    {
        $this->note_to_payee = $note_to_payee;
        return $this;
    }

    /**
     * Note to the recipient of the funds in this transaction.
     * @deprecated Instead use getNoteToPayee
     *
     * @return string
     */
    public function getNote_to_payee()
    {
        return $this->note_to_payee;
    }

    /**
     * free-form field for the use of clients
     * 
     *
     * @param string $custom
     * 
     * @return $this
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
        return $this;
    }

    /**
     * free-form field for the use of clients
     *
     * @return string
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * invoice number to track this payment
     * 
     *
     * @param string $invoice_number
     * 
     * @return $this
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->invoice_number = $invoice_number;
        return $this;
    }

    /**
     * invoice number to track this payment
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * invoice number to track this payment
     *
     * @deprecated Instead use setInvoiceNumber
     *
     * @param string $invoice_number
     * @return $this
     */
    public function setInvoice_number($invoice_number)
    {
        $this->invoice_number = $invoice_number;
        return $this;
    }

    /**
     * invoice number to track this payment
     * @deprecated Instead use getInvoiceNumber
     *
     * @return string
     */
    public function getInvoice_number()
    {
        return $this->invoice_number;
    }

    /**
     * Soft descriptor used when charging this funding source.
     * 
     *
     * @param string $soft_descriptor
     * 
     * @return $this
     */
    public function setSoftDescriptor($soft_descriptor)
    {
        $this->soft_descriptor = $soft_descriptor;
        return $this;
    }

    /**
     * Soft descriptor used when charging this funding source.
     *
     * @return string
     */
    public function getSoftDescriptor()
    {
        return $this->soft_descriptor;
    }

    /**
     * Soft descriptor used when charging this funding source.
     *
     * @deprecated Instead use setSoftDescriptor
     *
     * @param string $soft_descriptor
     * @return $this
     */
    public function setSoft_descriptor($soft_descriptor)
    {
        $this->soft_descriptor = $soft_descriptor;
        return $this;
    }

    /**
     * Soft descriptor used when charging this funding source.
     * @deprecated Instead use getSoftDescriptor
     *
     * @return string
     */
    public function getSoft_descriptor()
    {
        return $this->soft_descriptor;
    }

    /**
     * Payment options requested for this purchase unit
     * 
     *
     * @param \PayPal\Api\PaymentOptions $payment_options
     * 
     * @return $this
     */
    public function setPaymentOptions($payment_options)
    {
        $this->payment_options = $payment_options;
        return $this;
    }

    /**
     * Payment options requested for this purchase unit
     *
     * @return \PayPal\Api\PaymentOptions
     */
    public function getPaymentOptions()
    {
        return $this->payment_options;
    }

    /**
     * Payment options requested for this purchase unit
     *
     * @deprecated Instead use setPaymentOptions
     *
     * @param \PayPal\Api\PaymentOptions $payment_options
     * @return $this
     */
    public function setPayment_options($payment_options)
    {
        $this->payment_options = $payment_options;
        return $this;
    }

    /**
     * Payment options requested for this purchase unit
     * @deprecated Instead use getPaymentOptions
     *
     * @return \PayPal\Api\PaymentOptions
     */
    public function getPayment_options()
    {
        return $this->payment_options;
    }

    /**
     * List of items being paid for.
     * 
     *
     * @param \PayPal\Api\ItemList $item_list
     * 
     * @return $this
     */
    public function setItemList($item_list)
    {
        $this->item_list = $item_list;
        return $this;
    }

    /**
     * List of items being paid for.
     *
     * @return \PayPal\Api\ItemList
     */
    public function getItemList()
    {
        return $this->item_list;
    }

    /**
     * List of items being paid for.
     *
     * @deprecated Instead use setItemList
     *
     * @param \PayPal\Api\ItemList $item_list
     * @return $this
     */
    public function setItem_list($item_list)
    {
        $this->item_list = $item_list;
        return $this;
    }

    /**
     * List of items being paid for.
     * @deprecated Instead use getItemList
     *
     * @return \PayPal\Api\ItemList
     */
    public function getItem_list()
    {
        return $this->item_list;
    }

}
