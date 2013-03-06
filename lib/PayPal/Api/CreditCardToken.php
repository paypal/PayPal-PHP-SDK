<?php 

namespace PayPal\Api;

/**
 * 
 */
class CreditCardToken extends Resource {


	/**
	 * Setter for credit_card_id
	 * @param string $credit_card_id
	 */ 
	public function setCredit_card_id($credit_card_id) {
		$this->credit_card_id = $credit_card_id;
	}

	/**
	 * Getter for credit_card_id
	 */ 
	public function getCredit_card_id() {
		return $this->credit_card_id;
	}

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


}