<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class Search
 *
 * Invoice search parameters.
 *
 * @package PayPal\Api
 *
 * @property string email
 * @property string recipient_first_name
 * @property string recipient_last_name
 * @property string recipient_business_name
 * @property string number
 * @property string status
 * @property \PayPal\Api\Currency lower_total_amount
 * @property \PayPal\Api\Currency upper_total_amount
 * @property string start_invoice_date
 * @property string end_invoice_date
 * @property string start_due_date
 * @property string end_due_date
 * @property string start_payment_date
 * @property string end_payment_date
 * @property string start_creation_date
 * @property string end_creation_date
 * @property \PayPal\Api\number page
 * @property \PayPal\Api\number page_size
 * @property bool total_count_required
 */
class Search extends PPModel
{
    /**
     * Initial letters of the email address.
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
     * 
     * @return $this
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
     * @deprecated Instead use setRecipientFirstName
     *
     * @param string $recipient_first_name
     * @return $this
     */
    public function setRecipient_first_name($recipient_first_name)
    {
        $this->recipient_first_name = $recipient_first_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's first name.
     * @deprecated Instead use getRecipientFirstName
     *
     * @return string
     */
    public function getRecipient_first_name()
    {
        return $this->recipient_first_name;
    }

    /**
     * Initial letters of the recipient's last name.
     *
     * @param string $recipient_last_name
     * 
     * @return $this
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
     * @deprecated Instead use setRecipientLastName
     *
     * @param string $recipient_last_name
     * @return $this
     */
    public function setRecipient_last_name($recipient_last_name)
    {
        $this->recipient_last_name = $recipient_last_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's last name.
     * @deprecated Instead use getRecipientLastName
     *
     * @return string
     */
    public function getRecipient_last_name()
    {
        return $this->recipient_last_name;
    }

    /**
     * Initial letters of the recipient's business name.
     *
     * @param string $recipient_business_name
     * 
     * @return $this
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
     * @deprecated Instead use setRecipientBusinessName
     *
     * @param string $recipient_business_name
     * @return $this
     */
    public function setRecipient_business_name($recipient_business_name)
    {
        $this->recipient_business_name = $recipient_business_name;
        return $this;
    }

    /**
     * Initial letters of the recipient's business name.
     * @deprecated Instead use getRecipientBusinessName
     *
     * @return string
     */
    public function getRecipient_business_name()
    {
        return $this->recipient_business_name;
    }

    /**
     * The invoice number that appears on the invoice.
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
     * Valid Values: ["DRAFT", "SENT", "PAID", "MARKED_AS_PAID", "CANCELLED", "REFUNDED", "PARTIALLY_REFUNDED", "MARKED_AS_REFUNDED"]
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
     * @param \PayPal\Api\Currency $lower_total_amount
     * 
     * @return $this
     */
    public function setLowerTotalAmount($lower_total_amount)
    {
        $this->lower_total_amount = $lower_total_amount;
        return $this;
    }

    /**
     * Lower limit of total amount.
     *
     * @return \PayPal\Api\Currency
     */
    public function getLowerTotalAmount()
    {
        return $this->lower_total_amount;
    }

    /**
     * Lower limit of total amount.
     *
     * @deprecated Instead use setLowerTotalAmount
     *
     * @param \PayPal\Api\Currency $lower_total_amount
     * @return $this
     */
    public function setLower_total_amount($lower_total_amount)
    {
        $this->lower_total_amount = $lower_total_amount;
        return $this;
    }

    /**
     * Lower limit of total amount.
     * @deprecated Instead use getLowerTotalAmount
     *
     * @return \PayPal\Api\Currency
     */
    public function getLower_total_amount()
    {
        return $this->lower_total_amount;
    }

    /**
     * Upper limit of total amount.
     *
     * @param \PayPal\Api\Currency $upper_total_amount
     * 
     * @return $this
     */
    public function setUpperTotalAmount($upper_total_amount)
    {
        $this->upper_total_amount = $upper_total_amount;
        return $this;
    }

    /**
     * Upper limit of total amount.
     *
     * @return \PayPal\Api\Currency
     */
    public function getUpperTotalAmount()
    {
        return $this->upper_total_amount;
    }

    /**
     * Upper limit of total amount.
     *
     * @deprecated Instead use setUpperTotalAmount
     *
     * @param \PayPal\Api\Currency $upper_total_amount
     * @return $this
     */
    public function setUpper_total_amount($upper_total_amount)
    {
        $this->upper_total_amount = $upper_total_amount;
        return $this;
    }

    /**
     * Upper limit of total amount.
     * @deprecated Instead use getUpperTotalAmount
     *
     * @return \PayPal\Api\Currency
     */
    public function getUpper_total_amount()
    {
        return $this->upper_total_amount;
    }

    /**
     * Start invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $start_invoice_date
     * 
     * @return $this
     */
    public function setStartInvoiceDate($start_invoice_date)
    {
        $this->start_invoice_date = $start_invoice_date;
        return $this;
    }

    /**
     * Start invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getStartInvoiceDate()
    {
        return $this->start_invoice_date;
    }

    /**
     * Start invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setStartInvoiceDate
     *
     * @param string $start_invoice_date
     * @return $this
     */
    public function setStart_invoice_date($start_invoice_date)
    {
        $this->start_invoice_date = $start_invoice_date;
        return $this;
    }

    /**
     * Start invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getStartInvoiceDate
     *
     * @return string
     */
    public function getStart_invoice_date()
    {
        return $this->start_invoice_date;
    }

    /**
     * End invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $end_invoice_date
     * 
     * @return $this
     */
    public function setEndInvoiceDate($end_invoice_date)
    {
        $this->end_invoice_date = $end_invoice_date;
        return $this;
    }

    /**
     * End invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getEndInvoiceDate()
    {
        return $this->end_invoice_date;
    }

    /**
     * End invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setEndInvoiceDate
     *
     * @param string $end_invoice_date
     * @return $this
     */
    public function setEnd_invoice_date($end_invoice_date)
    {
        $this->end_invoice_date = $end_invoice_date;
        return $this;
    }

    /**
     * End invoice date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getEndInvoiceDate
     *
     * @return string
     */
    public function getEnd_invoice_date()
    {
        return $this->end_invoice_date;
    }

    /**
     * Start invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $start_due_date
     * 
     * @return $this
     */
    public function setStartDueDate($start_due_date)
    {
        $this->start_due_date = $start_due_date;
        return $this;
    }

    /**
     * Start invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getStartDueDate()
    {
        return $this->start_due_date;
    }

    /**
     * Start invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setStartDueDate
     *
     * @param string $start_due_date
     * @return $this
     */
    public function setStart_due_date($start_due_date)
    {
        $this->start_due_date = $start_due_date;
        return $this;
    }

    /**
     * Start invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getStartDueDate
     *
     * @return string
     */
    public function getStart_due_date()
    {
        return $this->start_due_date;
    }

    /**
     * End invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $end_due_date
     * 
     * @return $this
     */
    public function setEndDueDate($end_due_date)
    {
        $this->end_due_date = $end_due_date;
        return $this;
    }

    /**
     * End invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getEndDueDate()
    {
        return $this->end_due_date;
    }

    /**
     * End invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setEndDueDate
     *
     * @param string $end_due_date
     * @return $this
     */
    public function setEnd_due_date($end_due_date)
    {
        $this->end_due_date = $end_due_date;
        return $this;
    }

    /**
     * End invoice due date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getEndDueDate
     *
     * @return string
     */
    public function getEnd_due_date()
    {
        return $this->end_due_date;
    }

    /**
     * Start invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $start_payment_date
     * 
     * @return $this
     */
    public function setStartPaymentDate($start_payment_date)
    {
        $this->start_payment_date = $start_payment_date;
        return $this;
    }

    /**
     * Start invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getStartPaymentDate()
    {
        return $this->start_payment_date;
    }

    /**
     * Start invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setStartPaymentDate
     *
     * @param string $start_payment_date
     * @return $this
     */
    public function setStart_payment_date($start_payment_date)
    {
        $this->start_payment_date = $start_payment_date;
        return $this;
    }

    /**
     * Start invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getStartPaymentDate
     *
     * @return string
     */
    public function getStart_payment_date()
    {
        return $this->start_payment_date;
    }

    /**
     * End invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $end_payment_date
     * 
     * @return $this
     */
    public function setEndPaymentDate($end_payment_date)
    {
        $this->end_payment_date = $end_payment_date;
        return $this;
    }

    /**
     * End invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getEndPaymentDate()
    {
        return $this->end_payment_date;
    }

    /**
     * End invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setEndPaymentDate
     *
     * @param string $end_payment_date
     * @return $this
     */
    public function setEnd_payment_date($end_payment_date)
    {
        $this->end_payment_date = $end_payment_date;
        return $this;
    }

    /**
     * End invoice payment date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getEndPaymentDate
     *
     * @return string
     */
    public function getEnd_payment_date()
    {
        return $this->end_payment_date;
    }

    /**
     * Start invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $start_creation_date
     * 
     * @return $this
     */
    public function setStartCreationDate($start_creation_date)
    {
        $this->start_creation_date = $start_creation_date;
        return $this;
    }

    /**
     * Start invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getStartCreationDate()
    {
        return $this->start_creation_date;
    }

    /**
     * Start invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setStartCreationDate
     *
     * @param string $start_creation_date
     * @return $this
     */
    public function setStart_creation_date($start_creation_date)
    {
        $this->start_creation_date = $start_creation_date;
        return $this;
    }

    /**
     * Start invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getStartCreationDate
     *
     * @return string
     */
    public function getStart_creation_date()
    {
        return $this->start_creation_date;
    }

    /**
     * End invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $end_creation_date
     * 
     * @return $this
     */
    public function setEndCreationDate($end_creation_date)
    {
        $this->end_creation_date = $end_creation_date;
        return $this;
    }

    /**
     * End invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getEndCreationDate()
    {
        return $this->end_creation_date;
    }

    /**
     * End invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setEndCreationDate
     *
     * @param string $end_creation_date
     * @return $this
     */
    public function setEnd_creation_date($end_creation_date)
    {
        $this->end_creation_date = $end_creation_date;
        return $this;
    }

    /**
     * End invoice creation date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getEndCreationDate
     *
     * @return string
     */
    public function getEnd_creation_date()
    {
        return $this->end_creation_date;
    }

    /**
     * Offset of the search results.
     *
     * @param \PayPal\Api\number $page
     * 
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Offset of the search results.
     *
     * @return \PayPal\Api\number
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Page size of the search results.
     *
     * @param \PayPal\Api\number $page_size
     * 
     * @return $this
     */
    public function setPageSize($page_size)
    {
        $this->page_size = $page_size;
        return $this;
    }

    /**
     * Page size of the search results.
     *
     * @return \PayPal\Api\number
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * Page size of the search results.
     *
     * @deprecated Instead use setPageSize
     *
     * @param \PayPal\Api\number $page_size
     * @return $this
     */
    public function setPage_size($page_size)
    {
        $this->page_size = $page_size;
        return $this;
    }

    /**
     * Page size of the search results.
     * @deprecated Instead use getPageSize
     *
     * @return \PayPal\Api\number
     */
    public function getPage_size()
    {
        return $this->page_size;
    }

    /**
     * A flag indicating whether total count is required in the response.
     *
     * @param bool $total_count_required
     * 
     * @return $this
     */
    public function setTotalCountRequired($total_count_required)
    {
        $this->total_count_required = $total_count_required;
        return $this;
    }

    /**
     * A flag indicating whether total count is required in the response.
     *
     * @return bool
     */
    public function getTotalCountRequired()
    {
        return $this->total_count_required;
    }

    /**
     * A flag indicating whether total count is required in the response.
     *
     * @deprecated Instead use setTotalCountRequired
     *
     * @param bool $total_count_required
     * @return $this
     */
    public function setTotal_count_required($total_count_required)
    {
        $this->total_count_required = $total_count_required;
        return $this;
    }

    /**
     * A flag indicating whether total count is required in the response.
     * @deprecated Instead use getTotalCountRequired
     *
     * @return bool
     */
    public function getTotal_count_required()
    {
        return $this->total_count_required;
    }

}
