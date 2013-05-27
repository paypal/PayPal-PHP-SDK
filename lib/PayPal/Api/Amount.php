<?php
namespace PayPal\Api;


class Amount extends \PPModel {
	/**
	 * 3 letter currency code
	 * @param string $currency
	 */
	public function setCurrency($currency) {
		$this->currency = $currency;
	}	
	
	/**
	 * 3 letter currency code
	 * @return string
	 */
	public function getCurrency() {
		return $this->currency;
	}
	
	/**
	 * Total amount charged from the Payer account (or card) to Payee. In case of a refund, this is the refunded amount to the original Payer from Payee account.
	 * @param string $total
	 */
	public function setTotal($total) {
		$this->total = $total;
	}	
	
	/**
	 * Total amount charged from the Payer account (or card) to Payee. In case of a refund, this is the refunded amount to the original Payer from Payee account.
	 * @return string
	 */
	public function getTotal() {
		return $this->total;
	}
	
	/**
	 * Additional details of the payment amount.
	 * @param PayPal\Api\Details $details
	 */
	public function setDetails($details) {
		$this->details = $details;
	}	
	
	/**
	 * Additional details of the payment amount.
	 * @return PayPal\Api\Details
	 */
	public function getDetails() {
		return $this->details;
	}
	
}
