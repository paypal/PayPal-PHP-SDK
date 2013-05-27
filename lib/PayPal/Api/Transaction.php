<?php
namespace PayPal\Api;


class Transaction extends \PPModel {
	/**
	 * Amount being collected.
	 * @param PayPal\Api\Amount $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}	
	
	/**
	 * Amount being collected.
	 * @return PayPal\Api\Amount
	 */
	public function getAmount() {
		return $this->amount;
	}
	
	/**
	 * Recepient of the funds in this transaction.
	 * @param PayPal\Api\Payee $payee
	 */
	public function setPayee($payee) {
		$this->payee = $payee;
	}	
	
	/**
	 * Recepient of the funds in this transaction.
	 * @return PayPal\Api\Payee
	 */
	public function getPayee() {
		return $this->payee;
	}
	
	/**
	 * Description of what is being paid for.
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}	
	
	/**
	 * Description of what is being paid for.
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * List of items being paid for.
	 * @param PayPal\Api\ItemList $item_list
	 */
	public function setItemList($item_list) {
		$this->item_list = $item_list;
	}	
	
	/**
	 * List of items being paid for.
	 * @return PayPal\Api\ItemList
	 */
	public function getItemList() {
		return $this->item_list;
	}
	
	/**
	 * List of financial transactions (Sale, Authorization, Capture, Refund) related to the payment.
	 * @array
	 * @param PayPal\Api\RelatedResources $related_resources
	 */
	public function setRelatedResources($related_resources) {
		$this->related_resources = $related_resources;
	}	
	
	/**
	 * List of financial transactions (Sale, Authorization, Capture, Refund) related to the payment.
	 * @return PayPal\Api\RelatedResources
	 */
	public function getRelatedResources() {
		return $this->related_resources;
	}
	
	/**
	 * Additional transactions for complex payment (Parallel and Chained) scenarios.
	 * @array
	 * @param PayPal\Api\self $transactions
	 */
	public function setTransactions($transactions) {
		$this->transactions = $transactions;
	}	
	
	/**
	 * Additional transactions for complex payment (Parallel and Chained) scenarios.
	 * @return PayPal\Api\self
	 */
	public function getTransactions() {
		return $this->transactions;
	}
	
}
