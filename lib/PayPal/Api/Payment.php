<?php 

namespace PayPal\Api;
use PayPal\Rest\IResource;
use PayPal\Rest\Call;
use PayPal\Rest\ApiContext;

/**
 * 
 */
class Payment extends Resource implements IResource {

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
	 */ 
	public function getState() {
		return $this->state;
	}

	/**
	 * Setter for intent
	 * @param string $intent
	 */ 
	public function setIntent($intent) {
		$this->intent = $intent;
	}

	/**
	 * Getter for intent
	 */ 
	public function getIntent() {
		return $this->intent;
	}

	/**
	 * Setter for payer
	 * @param PayPal\Api\Payer $payer
	 */ 
	public function setPayer($payer) {
		$this->payer = $payer;
	}

	/**
	 * Getter for payer
	 */ 
	public function getPayer() {
		return $this->payer;
	}

	/**
	 * Setter for transactions
	 * @param PayPal\Api\Transaction $transactions
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

	/**
	 * Setter for redirect_urls
	 * @param PayPal\Api\RedirectUrls $redirect_urls
	 */ 
	public function setRedirect_urls($redirect_urls) {
		$this->redirect_urls = $redirect_urls;
	}

	/**
	 * Getter for redirect_urls
	 */ 
	public function getRedirect_urls() {
		return $this->redirect_urls;
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
	 */ 
	public function getLinks() {
		return $this->links;
	}

	
	
	/**
	 * @path /v1/payments/payment
	 * @method GET
	 * @param array $params
	 *			array containing the query strings with the 
	 *			following values as keys:
	 *			count,
	 *			start_id,
	 *			start_index,
	 *			start_time,
	 *			end_time,
	 *			payee_id,
	 *			sort_by,
	 *			sort_order,
	 *			All other keys in the map are ignored by the SDK	  	 
	 */
	public static function all($params) {
		$payLoad = "";
		$allowedParams = array('count' => 1, 'start_id' => 1, 'start_index' => 1, 'start_time' => 1, 'end_time' => 1, 'payee_id' => 1, 'sort_by' => 1, 'sort_order' => 1, );		
		
		$apiContext = new ApiContext(self::$credential);		$call = new Call();		
		$json = $call->execute("/v1/payments/payment?" . http_build_query(array_intersect_key($params, $allowedParams)), "GET", $payLoad, $apiContext);
		$ret = new PaymentHistory();
		$ret->fromJson($json);
		return $ret;
 		 		
 	}
	
	/**
	 * @path /v1/payments/payment
	 * @method POST
	  
	 * @param PayPal\Rest\ApiContext $apiContext optional	  	 
	 */
	public function create( $apiContext=null) {
		$payLoad = $this->toJSON();	
		if($apiContext == null) {
			$apiContext = new ApiContext(self::$credential);
		}
		$call = new Call();		
		$json = $call->execute("/v1/payments/payment", "POST", $payLoad, $apiContext);
		$this->fromJson($json);
 		return $this; 		
 	}
	
	/**
	 * @path /v1/payments/payment/:payment-id
	 * @method GET
	 * @param string $paymentid	  	 
	 */
	public static function get( $paymentid) {
		if (($paymentid == null) || (strlen($paymentid) <= 0)) {
			throw new \InvalidArgumentException("paymentid cannot be null or empty");
		}
		$payLoad = "";
		
		$apiContext = new ApiContext(self::$credential);		$call = new Call();		
		$json = $call->execute("/v1/payments/payment/$paymentid", "GET", $payLoad, $apiContext);
		$ret = new Payment();
		$ret->fromJson($json);
		return $ret;
 		 		
 	}
	
	/**
	 * @path /v1/payments/payment/:payment-id/execute
	 * @method POST
	 * @param PaymentExecution $payment_execution	  
	 * @param PayPal\Rest\ApiContext $apiContext optional	  	 
	 */
	public function execute( $payment_execution, $apiContext=null) {
		if ($payment_execution == null) {
			throw new \InvalidArgumentException("payment_execution cannot be null");
		}
		if ($this->getId() == null) {
			throw new \InvalidArgumentException("Id cannot be null");
		}
		$payLoad = $payment_execution->toJSON();	
		if($apiContext == null) {
			$apiContext = new ApiContext(self::$credential);
		}
		$call = new Call();		
		$json = $call->execute("/v1/payments/payment/{$this->getId()}/execute", "POST", $payLoad, $apiContext);
		$this->fromJson($json);
 		return $this; 		
 	}
	

}