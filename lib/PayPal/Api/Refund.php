<?php 

namespace PayPal\Api;
use PayPal\Rest\IResource;
use PayPal\Rest\Call;
use PayPal\Rest\ApiContext;

/**
 * 
 */
class Refund extends Resource implements IResource {

	private static $credential;
	
	public static function setCredential($credential) {
		self::$credential = $credential;
	}
	
	/**
	 * Setter for id
	 * @param string $id
	 */ 
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Getter for id
	 * @return string
	 */ 
	public function getId() {
		return $this->id;
	}

	/**
	 * Setter for create_time
	 * @param string $create_time
	 */ 
	public function setCreate_time($create_time) {
		$this->create_time = $create_time;
	}

	/**
	 * Getter for create_time
	 * @return string
	 */ 
	public function getCreate_time() {
		return $this->create_time;
	}

	/**
	 * Setter for update_time
	 * @param string $update_time
	 */ 
	public function setUpdate_time($update_time) {
		$this->update_time = $update_time;
	}

	/**
	 * Getter for update_time
	 * @return string
	 */ 
	public function getUpdate_time() {
		return $this->update_time;
	}

	/**
	 * Setter for state
	 * @param string $state
	 */ 
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * Getter for state
	 * @return string
	 */ 
	public function getState() {
		return $this->state;
	}

	/**
	 * Setter for amount
	 * @param PayPal\Api\Amount $amount
	 */ 
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * Getter for amount
	 * @return PayPal\Api\Amount
	 */ 
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * Setter for sale_id
	 * @param string $sale_id
	 */ 
	public function setSale_id($sale_id) {
		$this->sale_id = $sale_id;
	}

	/**
	 * Getter for sale_id
	 * @return string
	 */ 
	public function getSale_id() {
		return $this->sale_id;
	}

	/**
	 * Setter for capture_id
	 * @param string $capture_id
	 */ 
	public function setCapture_id($capture_id) {
		$this->capture_id = $capture_id;
	}

	/**
	 * Getter for capture_id
	 * @return string
	 */ 
	public function getCapture_id() {
		return $this->capture_id;
	}

	/**
	 * Setter for parent_payment
	 * @param string $parent_payment
	 */ 
	public function setParent_payment($parent_payment) {
		$this->parent_payment = $parent_payment;
	}

	/**
	 * Getter for parent_payment
	 * @return string
	 */ 
	public function getParent_payment() {
		return $this->parent_payment;
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
	 * @return string
	 */ 
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Setter for links
	 * @param PayPal\Api\Link $links
	 */ 
	public function setLinks($links) {
		$this->links = $links;
	}

	/**
	 * Getter for links
	 * @return PayPal\Api\Link
	 */ 
	public function getLinks() {
		return $this->links;
	}

	
	
	/**
	 * @path /v1/payments/refund/:refund-id
	 * @method GET
	 * @param string $refundid	  
	 * @param PayPal\Rest\ApiContext $apiContext optional
	 */
	public static function get( $refundid, $apiContext=null) {
		if (($refundid == null) || (strlen($refundid) <= 0)) {
			throw new \InvalidArgumentException("refundid cannot be null or empty");
		}
		$payLoad = "";
		if($apiContext == null) {
			$apiContext = new ApiContext(self::$credential);
		}
		$call = new \PPRestCall($apiContext);		
		$json = $call->execute( array('PayPal\Rest\RestHandler'),
			"/v1/payments/refund/$refundid", 
			"GET", $payLoad);
		$ret = new Refund();
		$ret->fromJson($json);
		return $ret;
 		 		
 	}
	

}
