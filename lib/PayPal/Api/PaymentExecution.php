<?php 

namespace PayPal\Api;

/**
 * 
 */
class PaymentExecution extends Resource {


	/**
	 * Setter for payer_id
	 * @param string $payer_id
	 */ 
	public function setPayer_id($payer_id) {
		$this->payer_id = $payer_id;
	}

	/**
	 * Getter for payer_id
	 */ 
	public function getPayer_id() {
		return $this->payer_id;
	}

	/**
	 * Setter for transactions
	 * @param PayPal\Api\Amount $transactions
	 */ 
	public function setTransactions($transactions) {
		$this->transactions = $transactions;
	}

	/**
	 * Getter for transactions
	 */ 
	public function getTransactions() {
		return $this->transactions;
	}


}