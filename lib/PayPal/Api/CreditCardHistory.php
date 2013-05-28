<?php
namespace PayPal\Api;


class CreditCardHistory extends \PPModel {
	/**
	 * A list of credit card resources
	 * @array
	 * @param PayPal\Api\CreditCard $credit-cards
	 */
	public function setCreditCards($credit_cards) {
		$this->credit_cards = $credit_cards;
		return $this;
	}

	/**
	 * A list of credit card resources
	 * @return PayPal\Api\CreditCard
	 */
	public function getCreditCards() {
		return $this->credit-cards;
	}

	/**
	 * Deprecated method
	 */
	public function setCredit_cards($credit_cards) {
		$this->credit_cards = $credit_cards;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getCredit_cards() {
		return $this->credit-cards;
	}

	/**
	 * Number of items returned in each range of results. Note that the last results range could have fewer items than the requested number of items.
	 * @param integer $count
	 */
	public function setCount($count) {
		$this->count = $count;
		return $this;
	}

	/**
	 * Number of items returned in each range of results. Note that the last results range could have fewer items than the requested number of items.
	 * @return integer
	 */
	public function getCount() {
		return $this->count;
	}


	/**
	 * Identifier of the next element to get the next range of results.
	 * @param string $next_id
	 */
	public function setNextId($next_id) {
		$this->next_id = $next_id;
		return $this;
	}

	/**
	 * Identifier of the next element to get the next range of results.
	 * @return string
	 */
	public function getNextId() {
		return $this->next_id;
	}

	/**
	 * Deprecated method
	 */
	public function setNext_id($next_id) {
		$this->next_id = $next_id;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getNext_id() {
		return $this->next_id;
	}

}
