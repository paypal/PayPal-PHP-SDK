<?php 

namespace PayPal\Api;

/**
 * 
 */
class FundingInstrument extends Resource {


	/**
	 * Setter for credit_card
	 * @param PayPal\Api\CreditCard $credit_card
	 */ 
	public function setCredit_card($credit_card) {
		$this->credit_card = $credit_card;
	}

	/**
	 * Getter for credit_card
	 */ 
	public function getCredit_card() {
		return $this->credit_card;
	}

	/**
	 * Setter for credit_card_token
	 * @param PayPal\Api\CreditCardToken $credit_card_token
	 */ 
	public function setCredit_card_token($credit_card_token) {
		$this->credit_card_token = $credit_card_token;
	}

	/**
	 * Getter for credit_card_token
	 */ 
	public function getCredit_card_token() {
		return $this->credit_card_token;
	}


}