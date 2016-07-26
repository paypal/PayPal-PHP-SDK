<?php

namespace PayPal\Rest\Api;

use PayPal\Rest\Common\PayPalModel;

/**
 * Class InvoiceSearchResponse
 *
 * 
 *
 * @package PayPal\Api
 *
 * @property int total_count
 * @property \PayPal\Rest\Api\Invoice[] invoices
 */
class InvoiceSearchResponse extends PayPalModel
{
    /**
     * Total number of invoices.
     *
     * @param int $total_count
     * 
     * @return $this
     */
    public function setTotalCount($total_count)
    {
        $this->total_count = $total_count;
        return $this;
    }

    /**
     * Total number of invoices.
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * List of invoices belonging to a merchant.
     *
     * @param \PayPal\Rest\Api\Invoice[] $invoices
     * 
     * @return $this
     */
    public function setInvoices($invoices)
    {
        $this->invoices = $invoices;
        return $this;
    }

    /**
     * List of invoices belonging to a merchant.
     *
     * @return \PayPal\Rest\Api\Invoice[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * Append Invoices to the list.
     *
     * @param \PayPal\Rest\Api\Invoice $invoice
     * @return $this
     */
    public function addInvoice($invoice)
    {
        if (!$this->getInvoices()) {
            return $this->setInvoices(array($invoice));
        } else {
            return $this->setInvoices(
                array_merge($this->getInvoices(), array($invoice))
            );
        }
    }

    /**
     * Remove Invoices from the list.
     *
     * @param \PayPal\Rest\Api\Invoice $invoice
     * @return $this
     */
    public function removeInvoice($invoice)
    {
        return $this->setInvoices(
            array_diff($this->getInvoices(), array($invoice))
        );
    }

}
