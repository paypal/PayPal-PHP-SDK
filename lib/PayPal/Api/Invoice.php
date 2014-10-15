<?php
namespace PayPal\Api;

use PayPal\Common\ResourceModel;
use PayPal\Api\Invoices;
use PayPal\Validation\ArgumentValidator;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;

/**
 * Class Invoice
 *
 * @package PayPal\Api
 */
class Invoice extends ResourceModel
{
    /**
     * Unique invoice resource identifier.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Unique invoice resource identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Unique number that appears on the invoice. If left blank will be auto-incremented from the last number. 25 characters max.
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Unique number that appears on the invoice. If left blank will be auto-incremented from the last number. 25 characters max.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }


    /**
     * URI of the invoice resource.
     *
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * URI of the invoice resource.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
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
     * Information about the merchant who is sending the invoice.
     *
     * @param PayPal\Api\MerchantInfo $merchant_info
     */
    public function setMerchantInfo($merchant_info)
    {
        $this->merchant_info = $merchant_info;
        return $this;
    }

    /**
     * Information about the merchant who is sending the invoice.
     *
     * @return PayPal\Api\MerchantInfo
     */
    public function getMerchantInfo()
    {
        return $this->merchant_info;
    }

    /**
     * Information about the merchant who is sending the invoice.
     *
     * @param PayPal\Api\MerchantInfo $merchant_info
     * @deprecated. Instead use setMerchantInfo
     */
    public function setMerchant_info($merchant_info)
    {
        $this->merchant_info = $merchant_info;
        return $this;
    }

    /**
     * Information about the merchant who is sending the invoice.
     *
     * @return PayPal\Api\MerchantInfo
     * @deprecated. Instead use getMerchantInfo
     */
    public function getMerchant_info()
    {
        return $this->merchant_info;
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     *
     * @param PayPal\Api\BillingInfo $billing_info
     */
    public function setBillingInfo($billing_info)
    {
        $this->billing_info = $billing_info;
        return $this;
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     *
     * @return PayPal\Api\BillingInfo
     */
    public function getBillingInfo()
    {
        return $this->billing_info;
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     *
     * @param PayPal\Api\BillingInfo $billing_info
     * @deprecated. Instead use setBillingInfo
     */
    public function setBilling_info($billing_info)
    {
        $this->billing_info = $billing_info;
        return $this;
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     *
     * @return PayPal\Api\BillingInfo
     * @deprecated. Instead use getBillingInfo
     */
    public function getBilling_info()
    {
        return $this->billing_info;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     *
     * @param PayPal\Api\ShippingInfo $shipping_info
     */
    public function setShippingInfo($shipping_info)
    {
        $this->shipping_info = $shipping_info;
        return $this;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     *
     * @return PayPal\Api\ShippingInfo
     */
    public function getShippingInfo()
    {
        return $this->shipping_info;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     *
     * @param PayPal\Api\ShippingInfo $shipping_info
     * @deprecated. Instead use setShippingInfo
     */
    public function setShipping_info($shipping_info)
    {
        $this->shipping_info = $shipping_info;
        return $this;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     *
     * @return PayPal\Api\ShippingInfo
     * @deprecated. Instead use getShippingInfo
     */
    public function getShipping_info()
    {
        return $this->shipping_info;
    }

    /**
     * List of items included in the invoice. 100 items max per invoice.
     *
     * @param PayPal\Api\InvoiceItem $items
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * List of items included in the invoice. 100 items max per invoice.
     *
     * @return PayPal\Api\InvoiceItem
     */
    public function getItems()
    {
        return $this->items;
    }


    /**
     * Date on which the invoice was enabled. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @param string $invoice_date
     */
    public function setInvoiceDate($invoice_date)
    {
        $this->invoice_date = $invoice_date;
        return $this;
    }

    /**
     * Date on which the invoice was enabled. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @return string
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Date on which the invoice was enabled. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @param string $invoice_date
     * @deprecated. Instead use setInvoiceDate
     */
    public function setInvoice_date($invoice_date)
    {
        $this->invoice_date = $invoice_date;
        return $this;
    }

    /**
     * Date on which the invoice was enabled. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @return string
     * @deprecated. Instead use getInvoiceDate
     */
    public function getInvoice_date()
    {
        return $this->invoice_date;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     *
     * @param PayPal\Api\PaymentTerm $payment_term
     */
    public function setPaymentTerm($payment_term)
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     *
     * @return PayPal\Api\PaymentTerm
     */
    public function getPaymentTerm()
    {
        return $this->payment_term;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     *
     * @param PayPal\Api\PaymentTerm $payment_term
     * @deprecated. Instead use setPaymentTerm
     */
    public function setPayment_term($payment_term)
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     *
     * @return PayPal\Api\PaymentTerm
     * @deprecated. Instead use getPaymentTerm
     */
    public function getPayment_term()
    {
        return $this->payment_term;
    }

    /**
     * Invoice level discount in percent or amount.
     *
     * @param PayPal\Api\Cost $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Invoice level discount in percent or amount.
     *
     * @return PayPal\Api\Cost
     */
    public function getDiscount()
    {
        return $this->discount;
    }


    /**
     * Shipping cost in percent or amount.
     *
     * @param PayPal\Api\ShippingCost $shipping_cost
     */
    public function setShippingCost($shipping_cost)
    {
        $this->shipping_cost = $shipping_cost;
        return $this;
    }

    /**
     * Shipping cost in percent or amount.
     *
     * @return PayPal\Api\ShippingCost
     */
    public function getShippingCost()
    {
        return $this->shipping_cost;
    }

    /**
     * Shipping cost in percent or amount.
     *
     * @param PayPal\Api\ShippingCost $shipping_cost
     * @deprecated. Instead use setShippingCost
     */
    public function setShipping_cost($shipping_cost)
    {
        $this->shipping_cost = $shipping_cost;
        return $this;
    }

    /**
     * Shipping cost in percent or amount.
     *
     * @return PayPal\Api\ShippingCost
     * @deprecated. Instead use getShippingCost
     */
    public function getShipping_cost()
    {
        return $this->shipping_cost;
    }

    /**
     * Custom amount applied on an invoice. If a label is included then the amount cannot be empty.
     *
     * @param PayPal\Api\CustomAmount $custom
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
        return $this;
    }

    /**
     * Custom amount applied on an invoice. If a label is included then the amount cannot be empty.
     *
     * @return PayPal\Api\CustomAmount
     */
    public function getCustom()
    {
        return $this->custom;
    }


    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     *
     * @param boolean $tax_calculated_after_discount
     */
    public function setTaxCalculatedAfterDiscount($tax_calculated_after_discount)
    {
        $this->tax_calculated_after_discount = $tax_calculated_after_discount;
        return $this;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     *
     * @return boolean
     */
    public function getTaxCalculatedAfterDiscount()
    {
        return $this->tax_calculated_after_discount;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     *
     * @param boolean $tax_calculated_after_discount
     * @deprecated. Instead use setTaxCalculatedAfterDiscount
     */
    public function setTax_calculated_after_discount($tax_calculated_after_discount)
    {
        $this->tax_calculated_after_discount = $tax_calculated_after_discount;
        return $this;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     *
     * @return boolean
     * @deprecated. Instead use getTaxCalculatedAfterDiscount
     */
    public function getTax_calculated_after_discount()
    {
        return $this->tax_calculated_after_discount;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     *
     * @param boolean $tax_inclusive
     */
    public function setTaxInclusive($tax_inclusive)
    {
        $this->tax_inclusive = $tax_inclusive;
        return $this;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     *
     * @return boolean
     */
    public function getTaxInclusive()
    {
        return $this->tax_inclusive;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     *
     * @param boolean $tax_inclusive
     * @deprecated. Instead use setTaxInclusive
     */
    public function setTax_inclusive($tax_inclusive)
    {
        $this->tax_inclusive = $tax_inclusive;
        return $this;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     *
     * @return boolean
     * @deprecated. Instead use getTaxInclusive
     */
    public function getTax_inclusive()
    {
        return $this->tax_inclusive;
    }

    /**
     * General terms of the invoice. 4000 characters max.
     *
     * @param string $terms
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;
        return $this;
    }

    /**
     * General terms of the invoice. 4000 characters max.
     *
     * @return string
     */
    public function getTerms()
    {
        return $this->terms;
    }


    /**
     * Note to the payer. 4000 characters max.
     *
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Note to the payer. 4000 characters max.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }


    /**
     * Bookkeeping memo that is private to the merchant. 150 characters max.
     *
     * @param string $merchant_memo
     */
    public function setMerchantMemo($merchant_memo)
    {
        $this->merchant_memo = $merchant_memo;
        return $this;
    }

    /**
     * Bookkeeping memo that is private to the merchant. 150 characters max.
     *
     * @return string
     */
    public function getMerchantMemo()
    {
        return $this->merchant_memo;
    }

    /**
     * Bookkeeping memo that is private to the merchant. 150 characters max.
     *
     * @param string $merchant_memo
     * @deprecated. Instead use setMerchantMemo
     */
    public function setMerchant_memo($merchant_memo)
    {
        $this->merchant_memo = $merchant_memo;
        return $this;
    }

    /**
     * Bookkeeping memo that is private to the merchant. 150 characters max.
     *
     * @return string
     * @deprecated. Instead use getMerchantMemo
     */
    public function getMerchant_memo()
    {
        return $this->merchant_memo;
    }

    /**
     * Full URL of an external image to use as the logo. 4000 characters max.
     *
     * @param string $logo_url
     */
    public function setLogoUrl($logo_url)
    {
        $this->logo_url = $logo_url;
        return $this;
    }

    /**
     * Full URL of an external image to use as the logo. 4000 characters max.
     *
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->logo_url;
    }

    /**
     * Full URL of an external image to use as the logo. 4000 characters max.
     *
     * @param string $logo_url
     * @deprecated. Instead use setLogoUrl
     */
    public function setLogo_url($logo_url)
    {
        $this->logo_url = $logo_url;
        return $this;
    }

    /**
     * Full URL of an external image to use as the logo. 4000 characters max.
     *
     * @return string
     * @deprecated. Instead use getLogoUrl
     */
    public function getLogo_url()
    {
        return $this->logo_url;
    }

    /**
     * The total amount of the invoice.
     *
     * @param PayPal\Api\Currency $total_amount
     */
    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    /**
     * The total amount of the invoice.
     *
     * @return PayPal\Api\Currency
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * The total amount of the invoice.
     *
     * @param PayPal\Api\Currency $total_amount
     * @deprecated. Instead use setTotalAmount
     */
    public function setTotal_amount($total_amount)
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    /**
     * The total amount of the invoice.
     *
     * @return PayPal\Api\Currency
     * @deprecated. Instead use getTotalAmount
     */
    public function getTotal_amount()
    {
        return $this->total_amount;
    }

    /**
     * Set Payments
     * A list of Payment resources
     *
     * @param \PayPal\Api\Payment $payments
     *
     * @return $this
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * Get Payments
     * A list of Payment resources
     *
     * @return \PayPal\Api\Payment
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * List of payment details for the invoice.
     *
     * @param PayPal\Api\PaymentDetail $payment_details
     */
    public function setPaymentDetails($payment_details)
    {
        $this->payment_details = $payment_details;
        return $this;
    }

    /**
     * List of payment details for the invoice.
     *
     * @return PayPal\Api\PaymentDetail
     */
    public function getPaymentDetails()
    {
        return $this->payment_details;
    }

    /**
     * List of payment details for the invoice.
     *
     * @param PayPal\Api\PaymentDetail $payment_details
     * @deprecated. Instead use setPaymentDetails
     */
    public function setPayment_details($payment_details)
    {
        $this->payment_details = $payment_details;
        return $this;
    }

    /**
     * List of payment details for the invoice.
     *
     * @return PayPal\Api\PaymentDetail
     * @deprecated. Instead use getPaymentDetails
     */
    public function getPayment_details()
    {
        return $this->payment_details;
    }

    /**
     * List of refund details for the invoice.
     *
     * @param PayPal\Api\RefundDetail $refund_details
     */
    public function setRefundDetails($refund_details)
    {
        $this->refund_details = $refund_details;
        return $this;
    }

    /**
     * List of refund details for the invoice.
     *
     * @return PayPal\Api\RefundDetail
     */
    public function getRefundDetails()
    {
        return $this->refund_details;
    }

    /**
     * List of refund details for the invoice.
     *
     * @param PayPal\Api\RefundDetail $refund_details
     * @deprecated. Instead use setRefundDetails
     */
    public function setRefund_details($refund_details)
    {
        $this->refund_details = $refund_details;
        return $this;
    }

    /**
     * List of refund details for the invoice.
     *
     * @return PayPal\Api\RefundDetail
     * @deprecated. Instead use getRefundDetails
     */
    public function getRefund_details()
    {
        return $this->refund_details;
    }

    /**
     * Audit information for the invoice.
     *
     * @param PayPal\Api\Metadata $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * Audit information for the invoice.
     *
     * @return PayPal\Api\Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }


    /**
     * Creates a new invoice Resource.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Invoice
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/invoicing/invoices",
            "POST",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Search for invoice resources.
     *
     * @param Search $search
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Invoices
     */
    public function search($search, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($search, 'search');
        $payLoad = $search->toJSON();
        $json = self::executeCall(
            "/v1/invoicing/search",
            "POST",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        $ret = new Invoices();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Sends a legitimate invoice to the payer.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function send($apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = "";
        self::executeCall(
            "/v1/invoicing/invoices/{$this->getId()}/send",
            "POST",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Reminds the payer to pay the invoice.
     *
     * @param Notification $notification
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function remind($notification, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($notification, "Notification");
        $payLoad = $notification->toJSON();
        self::executeCall(
            "/v1/invoicing/invoices/{$this->getId()}/remind",
            "POST",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Cancels an invoice.
     *
     * @param CancelNotification $cancelNotification
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function cancel($cancelNotification, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($cancelNotification, "CancelNotification");
        $payLoad = $cancelNotification->toJSON();
        self::executeCall(
            "/v1/invoicing/invoices/{$this->getId()}/cancel",
            "POST",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Mark the status of the invoice as paid.
     *
     * @param PaymentDetail $paymentDetail
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function record_payment($paymentDetail, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($paymentDetail, "PaymentDetail");
        $payLoad = $paymentDetail->toJSON();
        self::executeCall(
            "/v1/invoicing/invoices/{$this->getId()}/record-payment",
            "POST",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Mark the status of the invoice as refunded.
     *
     * @param RefundDetail $refundDetail
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function record_refund($refundDetail, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($refundDetail, "RefundDetail");
        $payLoad = $refundDetail->toJSON();
        self::executeCall(
            "/v1/invoicing/invoices/{$this->getId()}/record-refund",
            "POST",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Get the invoice resource for the given identifier.
     *
     * @param string $invoiceId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Invoice
     */
    public static function get($invoiceId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($invoiceId);
        $payLoad = "";
        $json = self::executeCall(
            "/v1/invoicing/invoices/$invoiceId",
            "GET",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        $ret = new Invoice();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Get all invoices of a merchant.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Invoices
     */
    public static function get_all($apiContext = null, $restCall = null)
    {
        $payLoad = "";
        $json = self::executeCall(
            "/v1/invoicing/invoices/",
            "GET",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        $ret = new Invoices();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Full update of the invoice resource for the given identifier.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Invoice
     */
    public function update($apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/invoicing/invoices/{$this->getId()}",
            "PUT",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Delete invoice resource for the given identifier.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function delete($apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = "";
        self::executeCall(
            "/v1/invoicing/invoices/{$this->getId()}",
            "DELETE",
            $payLoad,
            array(),
            $apiContext,
            $restCall
        );
        return true;
    }
}
