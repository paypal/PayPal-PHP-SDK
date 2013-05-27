<?php
namespace PayPal\Api;


class PaymentExecution extends \PPModel {
	/**
	 * PayPal assigned Payer ID returned in the approval return url.
	 * @param string $payer_id
	 */
	public function setPayerId($payer_id) {
		$this->payer_id = $payer_id;
	}	
	
	/**
	 * PayPal assigned Payer ID returned in the approval return url.
	 * @return string
	 */
	public function getPayerId() {
		return $this->payer_id;
	}
	
	/**
	 * If the amount needs to be updated after obtaining the PayPal Payer info (eg. shipping address), it can be updated using this element.
	 * @array
	 * @param PayPal\Api\Transactions $transactions
	 */
	public function setTransactions($transactions) {
		$this->transactions = $transactions;
	}	
	
	/**
	 * If the amount needs to be updated after obtaining the PayPal Payer info (eg. shipping address), it can be updated using this element.
	 * @return PayPal\Api\Transactions
	 */
	public function getTransactions() {
		return $this->transactions;
	}
	
}
