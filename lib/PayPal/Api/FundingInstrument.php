<?php
namespace PayPal\Api;


class FundingInstrument extends \PPModel {
	/**
	 * Credit Card information.
	 * @param PayPal\Api\CreditCard $credit_card
	 */
	public function setCreditCard($credit_card) {
		$this->credit_card = $credit_card;
	}	
	
	/**
	 * Credit Card information.
	 * @return PayPal\Api\CreditCard
	 */
	public function getCreditCard() {
		return $this->credit_card;
	}
	
	/**
	 * Credit Card information.
	 * @param PayPal\Api\CreditCardToken $credit_card_token
	 */
	public function setCreditCardToken($credit_card_token) {
		$this->credit_card_token = $credit_card_token;
	}	
	
	/**
	 * Credit Card information.
	 * @return PayPal\Api\CreditCardToken
	 */
	public function getCreditCardToken() {
		return $this->credit_card_token;
	}
	
}
