<?php 

namespace PayPal\Api;

/**
 * 
 */
class Transaction extends Resource {


	/**
	 * Setter for amount
	 * @param PayPal\Api\Amount $amount
	 */ 
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * Getter for amount
	 */ 
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * Setter for payee
	 * @param PayPal\Api\Payee $payee
	 */ 
	public function setPayee($payee) {
		$this->payee = $payee;
	}

	/**
	 * Getter for payee
	 */ 
	public function getPayee() {
		return $this->payee;
	}

	/**
	 * Setter for description
	 * @param string $description
	 */ 
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 */ 
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Setter for item_list
	 * @param PayPal\Api\ItemList $item_list
	 */ 
	public function setItem_list($item_list) {
		$this->item_list = $item_list;
	}

	/**
	 * Getter for item_list
	 */ 
	public function getItem_list() {
		return $this->item_list;
	}

	/**
	 * Setter for related_resources
	 * @param PayPal\Api\SubTransaction $related_resources
	 */ 
	public function setRelated_resources($related_resources) {
		$this->related_resources = $related_resources;
	}

	/**
	 * Getter for related_resources
	 */ 
	public function getRelated_resources() {
		return $this->related_resources;
	}


}