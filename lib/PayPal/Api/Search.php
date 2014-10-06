<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class Search extends PPModel
{
    /**
     * Initial letters of the email address.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Initial letters of the email address.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Initial letters of the recipient's first name.
     *
     * @param string $recipient_first_name
     */
    public function setRecipientFirstName($recipient_first_name)
    {
        $this->recipient_first_name = $recipient_first_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's first name.
     *
     * @return string
     */
    public function getRecipientFirstName()
    {
        return $this->recipient_first_name;
    }

    /**
     * Initial letters of the recipient's first name.
     *
     * @param string $recipient_first_name
     * @deprecated. Instead use setRecipientFirstName
     */
    public function setRecipient_first_name($recipient_first_name)
    {
        $this->recipient_first_name = $recipient_first_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's first name.
     *
     * @return string
     * @deprecated. Instead use getRecipientFirstName
     */
    public function getRecipient_first_name()
    {
        return $this->recipient_first_name;
    }

    /**
     * Initial letters of the recipient's last name.
     *
     * @param string $recipient_last_name
     */
    public function setRecipientLastName($recipient_last_name)
    {
        $this->recipient_last_name = $recipient_last_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's last name.
     *
     * @return string
     */
    public function getRecipientLastName()
    {
        return $this->recipient_last_name;
    }

    /**
     * Initial letters of the recipient's last name.
     *
     * @param string $recipient_last_name
     * @deprecated. Instead use setRecipientLastName
     */
    public function setRecipient_last_name($recipient_last_name)
    {
        $this->recipient_last_name = $recipient_last_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's last name.
     *
     * @return string
     * @deprecated. Instead use getRecipientLastName
     */
    public function getRecipient_last_name()
    {
        return $this->recipient_last_name;
    }

    /**
     * Initial letters of the recipient's business name.
     *
     * @param string $recipient_business_name
     */
    public function setRecipientBusinessName($recipient_business_name)
    {
        $this->recipient_business_name = $recipient_business_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's business name.
     *
     * @return string
     */
    public function getRecipientBusinessName()
    {
        return $this->recipient_business_name;
    }

    /**
     * Initial letters of the recipient's business name.
     *
     * @param string $recipient_business_name
     * @deprecated. Instead use setRecipientBusinessName
     */
    public function setRecipient_business_name($recipient_business_name)
    {
        $this->recipient_business_name = $recipient_business_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's business name.
     *
     * @return string
     * @deprecated. Instead use getRecipientBusinessName
     */
    public function getRecipient_business_name()
    {
        return $this->recipient_business_name;
    }

    /**
     * The invoice number that appears on the invoice.
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * The invoice number that appears on the invoice.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }


    /**
     * Status of the invoice.
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Status of the invoice.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * Lower limit of total amount.
     *
     * @param PayPal\Api\Currency $lower_total_amount
     */
    public function setLowerTotalAmount($lower_total_amount)
    {
        $this->lower_total_amount = $lower_total_amount;
        return $this;
    }

    /**
     * Lower limit of total amount.
     *
     * @return PayPal\Api\Currency
     */
    public function getLowerTotalAmount()
    {
        return $this->lower_total_amount;
    }

    /**
     * Lower limit of total amount.
     *
     * @param PayPal\Api\Currency $lower_total_amount
     * @deprecated. Instead use setLowerTotalAmount
     */
    public function setLower_total_amount($lower_total_amount)
    {
        $this->lower_total_amount = $lower_total_amount;
        return $this;
    }

    /**
     * Lower limit of total amount.
     *
     * @return PayPal\Api\Currency
     * @deprecated. Instead use getLowerTotalAmount
     */
    public function getLower_total_amount()
    {
        return $this->lower_total_amount;
    }

    /**
     * Upper limit of total amount.
     *
     * @param PayPal\Api\Currency $upper_total_amount
     */
    public function setUpperTotalAmount($upper_total_amount)
    {
        $this->upper_total_amount = $upper_total_amount;
        return $this;
    }

    /**
     * Upper limit of total amount.
     *
     * @return PayPal\Api\Currency
     */
    public function getUpperTotalAmount()
    {
        return $this->upper_total_amount;
    }

    /**
     * Upper limit of total amount.
     *
     * @param PayPal\Api\Currency $upper_total_amount
     * @deprecated. Instead use setUpperTotalAmount
     */
    public function setUpper_total_amount($upper_total_amount)
    {
        $this->upper_total_amount = $upper_total_amount;
        return $this;
    }

    /**
     * Upper limit of total amount.
     *
     * @return PayPal\Api\Currency
     * @deprecated. Instead use getUpperTotalAmount
     */
    public function getUpper_total_amount()
    {
        return $this->upper_total_amount;
    }

    /**
     * Start invoice date.
     *
     * @param string $start_invoice_date
     */
    public function setStartInvoiceDate($start_invoice_date)
    {
        $this->start_invoice_date = $start_invoice_date;
        return $this;
    }

    /**
     * Start invoice date.
     *
     * @return string
     */
    public function getStartInvoiceDate()
    {
        return $this->start_invoice_date;
    }

    /**
     * Start invoice date.
     *
     * @param string $start_invoice_date
     * @deprecated. Instead use setStartInvoiceDate
     */
    public function setStart_invoice_date($start_invoice_date)
    {
        $this->start_invoice_date = $start_invoice_date;
        return $this;
    }

    /**
     * Start invoice date.
     *
     * @return string
     * @deprecated. Instead use getStartInvoiceDate
     */
    public function getStart_invoice_date()
    {
        return $this->start_invoice_date;
    }

    /**
     * End invoice date.
     *
     * @param string $end_invoice_date
     */
    public function setEndInvoiceDate($end_invoice_date)
    {
        $this->end_invoice_date = $end_invoice_date;
        return $this;
    }

    /**
     * End invoice date.
     *
     * @return string
     */
    public function getEndInvoiceDate()
    {
        return $this->end_invoice_date;
    }

    /**
     * End invoice date.
     *
     * @param string $end_invoice_date
     * @deprecated. Instead use setEndInvoiceDate
     */
    public function setEnd_invoice_date($end_invoice_date)
    {
        $this->end_invoice_date = $end_invoice_date;
        return $this;
    }

    /**
     * End invoice date.
     *
     * @return string
     * @deprecated. Instead use getEndInvoiceDate
     */
    public function getEnd_invoice_date()
    {
        return $this->end_invoice_date;
    }

    /**
     * Start invoice due date.
     *
     * @param string $start_due_date
     */
    public function setStartDueDate($start_due_date)
    {
        $this->start_due_date = $start_due_date;
        return $this;
    }

    /**
     * Start invoice due date.
     *
     * @return string
     */
    public function getStartDueDate()
    {
        return $this->start_due_date;
    }

    /**
     * Start invoice due date.
     *
     * @param string $start_due_date
     * @deprecated. Instead use setStartDueDate
     */
    public function setStart_due_date($start_due_date)
    {
        $this->start_due_date = $start_due_date;
        return $this;
    }

    /**
     * Start invoice due date.
     *
     * @return string
     * @deprecated. Instead use getStartDueDate
     */
    public function getStart_due_date()
    {
        return $this->start_due_date;
    }

    /**
     * End invoice due date.
     *
     * @param string $end_due_date
     */
    public function setEndDueDate($end_due_date)
    {
        $this->end_due_date = $end_due_date;
        return $this;
    }

    /**
     * End invoice due date.
     *
     * @return string
     */
    public function getEndDueDate()
    {
        return $this->end_due_date;
    }

    /**
     * End invoice due date.
     *
     * @param string $end_due_date
     * @deprecated. Instead use setEndDueDate
     */
    public function setEnd_due_date($end_due_date)
    {
        $this->end_due_date = $end_due_date;
        return $this;
    }

    /**
     * End invoice due date.
     *
     * @return string
     * @deprecated. Instead use getEndDueDate
     */
    public function getEnd_due_date()
    {
        return $this->end_due_date;
    }

    /**
     * Start invoice payment date.
     *
     * @param string $start_payment_date
     */
    public function setStartPaymentDate($start_payment_date)
    {
        $this->start_payment_date = $start_payment_date;
        return $this;
    }

    /**
     * Start invoice payment date.
     *
     * @return string
     */
    public function getStartPaymentDate()
    {
        return $this->start_payment_date;
    }

    /**
     * Start invoice payment date.
     *
     * @param string $start_payment_date
     * @deprecated. Instead use setStartPaymentDate
     */
    public function setStart_payment_date($start_payment_date)
    {
        $this->start_payment_date = $start_payment_date;
        return $this;
    }

    /**
     * Start invoice payment date.
     *
     * @return string
     * @deprecated. Instead use getStartPaymentDate
     */
    public function getStart_payment_date()
    {
        return $this->start_payment_date;
    }

    /**
     * End invoice payment date.
     *
     * @param string $end_payment_date
     */
    public function setEndPaymentDate($end_payment_date)
    {
        $this->end_payment_date = $end_payment_date;
        return $this;
    }

    /**
     * End invoice payment date.
     *
     * @return string
     */
    public function getEndPaymentDate()
    {
        return $this->end_payment_date;
    }

    /**
     * End invoice payment date.
     *
     * @param string $end_payment_date
     * @deprecated. Instead use setEndPaymentDate
     */
    public function setEnd_payment_date($end_payment_date)
    {
        $this->end_payment_date = $end_payment_date;
        return $this;
    }

    /**
     * End invoice payment date.
     *
     * @return string
     * @deprecated. Instead use getEndPaymentDate
     */
    public function getEnd_payment_date()
    {
        return $this->end_payment_date;
    }

    /**
     * Start invoice creation date.
     *
     * @param string $start_creation_date
     */
    public function setStartCreationDate($start_creation_date)
    {
        $this->start_creation_date = $start_creation_date;
        return $this;
    }

    /**
     * Start invoice creation date.
     *
     * @return string
     */
    public function getStartCreationDate()
    {
        return $this->start_creation_date;
    }

    /**
     * Start invoice creation date.
     *
     * @param string $start_creation_date
     * @deprecated. Instead use setStartCreationDate
     */
    public function setStart_creation_date($start_creation_date)
    {
        $this->start_creation_date = $start_creation_date;
        return $this;
    }

    /**
     * Start invoice creation date.
     *
     * @return string
     * @deprecated. Instead use getStartCreationDate
     */
    public function getStart_creation_date()
    {
        return $this->start_creation_date;
    }

    /**
     * End invoice creation date.
     *
     * @param string $end_creation_date
     */
    public function setEndCreationDate($end_creation_date)
    {
        $this->end_creation_date = $end_creation_date;
        return $this;
    }

    /**
     * End invoice creation date.
     *
     * @return string
     */
    public function getEndCreationDate()
    {
        return $this->end_creation_date;
    }

    /**
     * End invoice creation date.
     *
     * @param string $end_creation_date
     * @deprecated. Instead use setEndCreationDate
     */
    public function setEnd_creation_date($end_creation_date)
    {
        $this->end_creation_date = $end_creation_date;
        return $this;
    }

    /**
     * End invoice creation date.
     *
     * @return string
     * @deprecated. Instead use getEndCreationDate
     */
    public function getEnd_creation_date()
    {
        return $this->end_creation_date;
    }

    /**
     * Offset of the search results.
     *
     * @param PayPal\Api\number $page
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Offset of the search results.
     *
     * @return PayPal\Api\number
     */
    public function getPage()
    {
        return $this->page;
    }


    /**
     * Page size of the search results.
     *
     * @param PayPal\Api\number $page_size
     */
    public function setPageSize($page_size)
    {
        $this->page_size = $page_size;
        return $this;
    }

    /**
     * Page size of the search results.
     *
     * @return PayPal\Api\number
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * Page size of the search results.
     *
     * @param PayPal\Api\number $page_size
     * @deprecated. Instead use setPageSize
     */
    public function setPage_size($page_size)
    {
        $this->page_size = $page_size;
        return $this;
    }

    /**
     * Page size of the search results.
     *
     * @return PayPal\Api\number
     * @deprecated. Instead use getPageSize
     */
    public function getPage_size()
    {
        return $this->page_size;
    }

    /**
     * A flag indicating whether total count is required in the response.
     *
     * @param boolean $total_count_required
     */
    public function setTotalCountRequired($total_count_required)
    {
        $this->total_count_required = $total_count_required;
        return $this;
    }

    /**
     * A flag indicating whether total count is required in the response.
     *
     * @return boolean
     */
    public function getTotalCountRequired()
    {
        return $this->total_count_required;
    }

    /**
     * A flag indicating whether total count is required in the response.
     *
     * @param boolean $total_count_required
     * @deprecated. Instead use setTotalCountRequired
     */
    public function setTotal_count_required($total_count_required)
    {
        $this->total_count_required = $total_count_required;
        return $this;
    }

    /**
     * A flag indicating whether total count is required in the response.
     *
     * @return boolean
     * @deprecated. Instead use getTotalCountRequired
     */
    public function getTotal_count_required()
    {
        return $this->total_count_required;
    }

}
