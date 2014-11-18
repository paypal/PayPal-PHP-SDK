<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Validation\UrlValidator;

/**
 * Class Invoices
 *
 * List of invoices belonging to a merchant.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string number
 * @property string uri
 * @property string status
 * @property \PayPal\Api\MerchantInfo merchant_info
 * @property \PayPal\Api\BillingInfo[] billing_info
 * @property \PayPal\Api\ShippingInfo shipping_info
 * @property \PayPal\Api\InvoiceItem[] items
 * @property string invoice_date
 * @property \PayPal\Api\PaymentTerm payment_term
 * @property \PayPal\Api\Cost discount
 * @property \PayPal\Api\ShippingCost shipping_cost
 * @property \PayPal\Api\CustomAmount custom
 * @property bool tax_calculated_after_discount
 * @property bool tax_inclusive
 * @property string terms
 * @property string note
 * @property string merchant_memo
 * @property string logo_url
 * @property \PayPal\Api\Currency total_amount
 * @property \PayPal\Api\PaymentDetail[] payment_details
 * @property \PayPal\Api\RefundDetail[] refund_details
 * @property \PayPal\Api\Metadata metadata
 * @property string additional_data
 */
class Invoices extends PPModel
{
    /**
     * Unique invoice resource identifier.
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
     * 
     * @return $this
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
     * 
     * @return $this
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
     * Information about the merchant who is sending the invoice.
     *
     * @param \PayPal\Api\MerchantInfo $merchant_info
     * 
     * @return $this
     */
    public function setMerchantInfo($merchant_info)
    {
        $this->merchant_info = $merchant_info;
        return $this;
    }

    /**
     * Information about the merchant who is sending the invoice.
     *
     * @return \PayPal\Api\MerchantInfo
     */
    public function getMerchantInfo()
    {
        return $this->merchant_info;
    }

    /**
     * Information about the merchant who is sending the invoice.
     *
     * @deprecated Instead use setMerchantInfo
     *
     * @param \PayPal\Api\MerchantInfo $merchant_info
     * @return $this
     */
    public function setMerchant_info($merchant_info)
    {
        $this->merchant_info = $merchant_info;
        return $this;
    }

    /**
     * Information about the merchant who is sending the invoice.
     * @deprecated Instead use getMerchantInfo
     *
     * @return \PayPal\Api\MerchantInfo
     */
    public function getMerchant_info()
    {
        return $this->merchant_info;
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     *
     * @param \PayPal\Api\BillingInfo[] $billing_info
     * 
     * @return $this
     */
    public function setBillingInfo($billing_info)
    {
        $this->billing_info = $billing_info;
        return $this;
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     *
     * @return \PayPal\Api\BillingInfo[]
     */
    public function getBillingInfo()
    {
        return $this->billing_info;
    }

    /**
     * Append BillingInfo to the list.
     *
     * @param \PayPal\Api\BillingInfo $billingInfo
     * @return $this
     */
    public function addBillingInfo($billingInfo)
    {
        if (!$this->getBillingInfo()) {
            return $this->setBillingInfo(array($billingInfo));
        } else {
            return $this->setBillingInfo(
                array_merge($this->getBillingInfo(), array($billingInfo))
            );
        }
    }

    /**
     * Remove BillingInfo from the list.
     *
     * @param \PayPal\Api\BillingInfo $billingInfo
     * @return $this
     */
    public function removeBillingInfo($billingInfo)
    {
        return $this->setBillingInfo(
            array_diff($this->getBillingInfo(), array($billingInfo))
        );
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     *
     * @deprecated Instead use setBillingInfo
     *
     * @param \PayPal\Api\BillingInfo $billing_info
     * @return $this
     */
    public function setBilling_info($billing_info)
    {
        $this->billing_info = $billing_info;
        return $this;
    }

    /**
     * Email address of invoice recipient (required) and optional billing information. (Note: We currently only allow one recipient).
     * @deprecated Instead use getBillingInfo
     *
     * @return \PayPal\Api\BillingInfo
     */
    public function getBilling_info()
    {
        return $this->billing_info;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     *
     * @param \PayPal\Api\ShippingInfo $shipping_info
     * 
     * @return $this
     */
    public function setShippingInfo($shipping_info)
    {
        $this->shipping_info = $shipping_info;
        return $this;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     *
     * @return \PayPal\Api\ShippingInfo
     */
    public function getShippingInfo()
    {
        return $this->shipping_info;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     *
     * @deprecated Instead use setShippingInfo
     *
     * @param \PayPal\Api\ShippingInfo $shipping_info
     * @return $this
     */
    public function setShipping_info($shipping_info)
    {
        $this->shipping_info = $shipping_info;
        return $this;
    }

    /**
     * Shipping information for entities to whom items are being shipped.
     * @deprecated Instead use getShippingInfo
     *
     * @return \PayPal\Api\ShippingInfo
     */
    public function getShipping_info()
    {
        return $this->shipping_info;
    }

    /**
     * List of items included in the invoice. 100 items max per invoice.
     *
     * @param \PayPal\Api\InvoiceItem[] $items
     * 
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * List of items included in the invoice. 100 items max per invoice.
     *
     * @return \PayPal\Api\InvoiceItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Append Items to the list.
     *
     * @param \PayPal\Api\InvoiceItem $invoiceItem
     * @return $this
     */
    public function addItem($invoiceItem)
    {
        if (!$this->getItems()) {
            return $this->setItems(array($invoiceItem));
        } else {
            return $this->setItems(
                array_merge($this->getItems(), array($invoiceItem))
            );
        }
    }

    /**
     * Remove Items from the list.
     *
     * @param \PayPal\Api\InvoiceItem $invoiceItem
     * @return $this
     */
    public function removeItem($invoiceItem)
    {
        return $this->setItems(
            array_diff($this->getItems(), array($invoiceItem))
        );
    }

    /**
     * Date on which the invoice was enabled. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $invoice_date
     * 
     * @return $this
     */
    public function setInvoiceDate($invoice_date)
    {
        $this->invoice_date = $invoice_date;
        return $this;
    }

    /**
     * Date on which the invoice was enabled. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Date on which the invoice was enabled. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setInvoiceDate
     *
     * @param string $invoice_date
     * @return $this
     */
    public function setInvoice_date($invoice_date)
    {
        $this->invoice_date = $invoice_date;
        return $this;
    }

    /**
     * Date on which the invoice was enabled. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getInvoiceDate
     *
     * @return string
     */
    public function getInvoice_date()
    {
        return $this->invoice_date;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     *
     * @param \PayPal\Api\PaymentTerm $payment_term
     * 
     * @return $this
     */
    public function setPaymentTerm($payment_term)
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     *
     * @return \PayPal\Api\PaymentTerm
     */
    public function getPaymentTerm()
    {
        return $this->payment_term;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     *
     * @deprecated Instead use setPaymentTerm
     *
     * @param \PayPal\Api\PaymentTerm $payment_term
     * @return $this
     */
    public function setPayment_term($payment_term)
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * Optional field to pass payment deadline for the invoice. Either term_type or due_date can be passed, but not both.
     * @deprecated Instead use getPaymentTerm
     *
     * @return \PayPal\Api\PaymentTerm
     */
    public function getPayment_term()
    {
        return $this->payment_term;
    }

    /**
     * Invoice level discount in percent or amount.
     *
     * @param \PayPal\Api\Cost $discount
     * 
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Invoice level discount in percent or amount.
     *
     * @return \PayPal\Api\Cost
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Shipping cost in percent or amount.
     *
     * @param \PayPal\Api\ShippingCost $shipping_cost
     * 
     * @return $this
     */
    public function setShippingCost($shipping_cost)
    {
        $this->shipping_cost = $shipping_cost;
        return $this;
    }

    /**
     * Shipping cost in percent or amount.
     *
     * @return \PayPal\Api\ShippingCost
     */
    public function getShippingCost()
    {
        return $this->shipping_cost;
    }

    /**
     * Shipping cost in percent or amount.
     *
     * @deprecated Instead use setShippingCost
     *
     * @param \PayPal\Api\ShippingCost $shipping_cost
     * @return $this
     */
    public function setShipping_cost($shipping_cost)
    {
        $this->shipping_cost = $shipping_cost;
        return $this;
    }

    /**
     * Shipping cost in percent or amount.
     * @deprecated Instead use getShippingCost
     *
     * @return \PayPal\Api\ShippingCost
     */
    public function getShipping_cost()
    {
        return $this->shipping_cost;
    }

    /**
     * Custom amount applied on an invoice. If a label is included then the amount cannot be empty.
     *
     * @param \PayPal\Api\CustomAmount $custom
     * 
     * @return $this
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
        return $this;
    }

    /**
     * Custom amount applied on an invoice. If a label is included then the amount cannot be empty.
     *
     * @return \PayPal\Api\CustomAmount
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     *
     * @param bool $tax_calculated_after_discount
     * 
     * @return $this
     */
    public function setTaxCalculatedAfterDiscount($tax_calculated_after_discount)
    {
        $this->tax_calculated_after_discount = $tax_calculated_after_discount;
        return $this;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     *
     * @return bool
     */
    public function getTaxCalculatedAfterDiscount()
    {
        return $this->tax_calculated_after_discount;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     *
     * @deprecated Instead use setTaxCalculatedAfterDiscount
     *
     * @param bool $tax_calculated_after_discount
     * @return $this
     */
    public function setTax_calculated_after_discount($tax_calculated_after_discount)
    {
        $this->tax_calculated_after_discount = $tax_calculated_after_discount;
        return $this;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If false (the default), the tax is calculated before a discount. If true, the tax is calculated after a discount.
     * @deprecated Instead use getTaxCalculatedAfterDiscount
     *
     * @return bool
     */
    public function getTax_calculated_after_discount()
    {
        return $this->tax_calculated_after_discount;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     *
     * @param bool $tax_inclusive
     * 
     * @return $this
     */
    public function setTaxInclusive($tax_inclusive)
    {
        $this->tax_inclusive = $tax_inclusive;
        return $this;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     *
     * @return bool
     */
    public function getTaxInclusive()
    {
        return $this->tax_inclusive;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     *
     * @deprecated Instead use setTaxInclusive
     *
     * @param bool $tax_inclusive
     * @return $this
     */
    public function setTax_inclusive($tax_inclusive)
    {
        $this->tax_inclusive = $tax_inclusive;
        return $this;
    }

    /**
     * A flag indicating whether the unit price includes tax. Default is false
     * @deprecated Instead use getTaxInclusive
     *
     * @return bool
     */
    public function getTax_inclusive()
    {
        return $this->tax_inclusive;
    }

    /**
     * General terms of the invoice. 4000 characters max.
     *
     * @param string $terms
     * 
     * @return $this
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
     * 
     * @return $this
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
     * 
     * @return $this
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
     * @deprecated Instead use setMerchantMemo
     *
     * @param string $merchant_memo
     * @return $this
     */
    public function setMerchant_memo($merchant_memo)
    {
        $this->merchant_memo = $merchant_memo;
        return $this;
    }

    /**
     * Bookkeeping memo that is private to the merchant. 150 characters max.
     * @deprecated Instead use getMerchantMemo
     *
     * @return string
     */
    public function getMerchant_memo()
    {
        return $this->merchant_memo;
    }

    /**
     * Full URL of an external image to use as the logo. 4000 characters max.
     *
     * @param string $logo_url
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setLogoUrl($logo_url)
    {
        UrlValidator::validate($logo_url, "LogoUrl");
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
     * @deprecated Instead use setLogoUrl
     *
     * @param string $logo_url
     * @return $this
     */
    public function setLogo_url($logo_url)
    {
        $this->logo_url = $logo_url;
        return $this;
    }

    /**
     * Full URL of an external image to use as the logo. 4000 characters max.
     * @deprecated Instead use getLogoUrl
     *
     * @return string
     */
    public function getLogo_url()
    {
        return $this->logo_url;
    }

    /**
     * The total amount of the invoice.
     *
     * @param \PayPal\Api\Currency $total_amount
     * 
     * @return $this
     */
    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    /**
     * The total amount of the invoice.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * The total amount of the invoice.
     *
     * @deprecated Instead use setTotalAmount
     *
     * @param \PayPal\Api\Currency $total_amount
     * @return $this
     */
    public function setTotal_amount($total_amount)
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    /**
     * The total amount of the invoice.
     * @deprecated Instead use getTotalAmount
     *
     * @return \PayPal\Api\Currency
     */
    public function getTotal_amount()
    {
        return $this->total_amount;
    }

    /**
     * List of payment details for the invoice.
     *
     * @param \PayPal\Api\PaymentDetail[] $payment_details
     * 
     * @return $this
     */
    public function setPaymentDetails($payment_details)
    {
        $this->payment_details = $payment_details;
        return $this;
    }

    /**
     * List of payment details for the invoice.
     *
     * @return \PayPal\Api\PaymentDetail[]
     */
    public function getPaymentDetails()
    {
        return $this->payment_details;
    }

    /**
     * Append PaymentDetails to the list.
     *
     * @param \PayPal\Api\PaymentDetail $paymentDetail
     * @return $this
     */
    public function addPaymentDetail($paymentDetail)
    {
        if (!$this->getPaymentDetails()) {
            return $this->setPaymentDetails(array($paymentDetail));
        } else {
            return $this->setPaymentDetails(
                array_merge($this->getPaymentDetails(), array($paymentDetail))
            );
        }
    }

    /**
     * Remove PaymentDetails from the list.
     *
     * @param \PayPal\Api\PaymentDetail $paymentDetail
     * @return $this
     */
    public function removePaymentDetail($paymentDetail)
    {
        return $this->setPaymentDetails(
            array_diff($this->getPaymentDetails(), array($paymentDetail))
        );
    }

    /**
     * List of payment details for the invoice.
     *
     * @deprecated Instead use setPaymentDetails
     *
     * @param \PayPal\Api\PaymentDetail $payment_details
     * @return $this
     */
    public function setPayment_details($payment_details)
    {
        $this->payment_details = $payment_details;
        return $this;
    }

    /**
     * List of payment details for the invoice.
     * @deprecated Instead use getPaymentDetails
     *
     * @return \PayPal\Api\PaymentDetail
     */
    public function getPayment_details()
    {
        return $this->payment_details;
    }

    /**
     * List of refund details for the invoice.
     *
     * @param \PayPal\Api\RefundDetail[] $refund_details
     * 
     * @return $this
     */
    public function setRefundDetails($refund_details)
    {
        $this->refund_details = $refund_details;
        return $this;
    }

    /**
     * List of refund details for the invoice.
     *
     * @return \PayPal\Api\RefundDetail[]
     */
    public function getRefundDetails()
    {
        return $this->refund_details;
    }

    /**
     * Append RefundDetails to the list.
     *
     * @param \PayPal\Api\RefundDetail $refundDetail
     * @return $this
     */
    public function addRefundDetail($refundDetail)
    {
        if (!$this->getRefundDetails()) {
            return $this->setRefundDetails(array($refundDetail));
        } else {
            return $this->setRefundDetails(
                array_merge($this->getRefundDetails(), array($refundDetail))
            );
        }
    }

    /**
     * Remove RefundDetails from the list.
     *
     * @param \PayPal\Api\RefundDetail $refundDetail
     * @return $this
     */
    public function removeRefundDetail($refundDetail)
    {
        return $this->setRefundDetails(
            array_diff($this->getRefundDetails(), array($refundDetail))
        );
    }

    /**
     * List of refund details for the invoice.
     *
     * @deprecated Instead use setRefundDetails
     *
     * @param \PayPal\Api\RefundDetail $refund_details
     * @return $this
     */
    public function setRefund_details($refund_details)
    {
        $this->refund_details = $refund_details;
        return $this;
    }

    /**
     * List of refund details for the invoice.
     * @deprecated Instead use getRefundDetails
     *
     * @return \PayPal\Api\RefundDetail
     */
    public function getRefund_details()
    {
        return $this->refund_details;
    }

    /**
     * Audit information for the invoice.
     *
     * @param \PayPal\Api\Metadata $metadata
     * 
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * Audit information for the invoice.
     *
     * @return \PayPal\Api\Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Any miscellaneous invoice data. 4000 characters max.
     *
     * @param string $additional_data
     * 
     * @return $this
     */
    public function setAdditionalData($additional_data)
    {
        $this->additional_data = $additional_data;
        return $this;
    }

    /**
     * Any miscellaneous invoice data. 4000 characters max.
     *
     * @return string
     */
    public function getAdditionalData()
    {
        return $this->additional_data;
    }

    /**
     * Any miscellaneous invoice data. 4000 characters max.
     *
     * @deprecated Instead use setAdditionalData
     *
     * @param string $additional_data
     * @return $this
     */
    public function setAdditional_data($additional_data)
    {
        $this->additional_data = $additional_data;
        return $this;
    }

    /**
     * Any miscellaneous invoice data. 4000 characters max.
     * @deprecated Instead use getAdditionalData
     *
     * @return string
     */
    public function getAdditional_data()
    {
        return $this->additional_data;
    }

}
