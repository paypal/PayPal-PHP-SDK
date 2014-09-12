<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class Invoices extends PPModel {
	/**
	 * 
	 *
	 * @param integer $total_count
	 */
	public function setTotalCount($total_count) {
		$this->total_count = $total_count;
		return $this;
	}

	/**
	 * 
	 *
	 * @return integer
	 */
	public function getTotalCount() {
		return $this->total_count;
	}

	/**
	 * 
	 *
	 * @param integer $total_count
	 * @deprecated. Instead use setTotalCount
	 */
	public function setTotal_count($total_count) {
		$this->total_count = $total_count;
		return $this;
	}
	/**
	 * 
	 *
	 * @return integer
	 * @deprecated. Instead use getTotalCount
	 */
	public function getTotal_count() {
		return $this->total_count;
	}

	/**
	 * List of invoices belonging to a merchant.
	 *
	 * @param PayPal\Api\Invoice $invoices
	 */
	public function setInvoices($invoices) {
		$this->invoices = $invoices;
		return $this;
	}

	/**
	 * List of invoices belonging to a merchant.
	 *
	 * @return PayPal\Api\Invoice
	 */
	public function getInvoices() {
		return $this->invoices;
	}


}
