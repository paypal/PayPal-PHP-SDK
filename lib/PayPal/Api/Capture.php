<?php
namespace PayPal\Api;

use PayPal\Rest\IResource;
use PayPal\Rest\Call;
use PayPal\Rest\ApiContext;

class Capture extends \PPModel implements IResource {

	private static $credential;

	/**
	 *
	 * @deprected. Pass ApiContext to create/get methods instead
	 */
	public static function setCredential($credential) {
		self::$credential = $credential;
	}

	/**
	 * Identifier of the Capture transaction.
	 * @param string $id
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * Identifier of the Capture transaction.
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}


	/**
	 * Time the resource was created.
	 * @param string $create_time
	 */
	public function setCreateTime($create_time) {
		$this->create_time = $create_time;
		return $this;
	}

	/**
	 * Time the resource was created.
	 * @return string
	 */
	public function getCreateTime() {
		return $this->create_time;
	}

	/**
	 * Deprecated method
	 */
	public function setCreate_time($create_time) {
		$this->create_time = $create_time;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getCreate_time() {
		return $this->create_time;
	}

	/**
	 * Time the resource was last updated.
	 * @param string $update_time
	 */
	public function setUpdateTime($update_time) {
		$this->update_time = $update_time;
		return $this;
	}

	/**
	 * Time the resource was last updated.
	 * @return string
	 */
	public function getUpdateTime() {
		return $this->update_time;
	}

	/**
	 * Deprecated method
	 */
	public function setUpdate_time($update_time) {
		$this->update_time = $update_time;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getUpdate_time() {
		return $this->update_time;
	}

	/**
	 * Amount being captured. If no amount is specified, amount is used from the authorization being captured. If amount is same as the amount that's authorized for, the state of the authorization changes to captured. If not, the state of the authorization changes to partially_captured. Alternatively, you could indicate a final capture by seting the is_final_capture flag to true.
	 * @param PayPal\Api\Amount $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}

	/**
	 * Amount being captured. If no amount is specified, amount is used from the authorization being captured. If amount is same as the amount that's authorized for, the state of the authorization changes to captured. If not, the state of the authorization changes to partially_captured. Alternatively, you could indicate a final capture by seting the is_final_capture flag to true.
	 * @return PayPal\Api\Amount
	 */
	public function getAmount() {
		return $this->amount;
	}


	/**
	 * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
	 * @param boolean $is_final_capture
	 */
	public function setIsFinalCapture($is_final_capture) {
		$this->is_final_capture = $is_final_capture;
		return $this;
	}

	/**
	 * whether this is a final capture for the given authorization or not. If it's final, all the remaining funds held by the authorization, will be released in the funding instrument.
	 * @return boolean
	 */
	public function getIsFinalCapture() {
		return $this->is_final_capture;
	}

	/**
	 * Deprecated method
	 */
	public function setIs_final_capture($is_final_capture) {
		$this->is_final_capture = $is_final_capture;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getIs_final_capture() {
		return $this->is_final_capture;
	}

	/**
	 * State of the capture transaction.
	 * @param string $state
	 */
	public function setState($state) {
		$this->state = $state;
		return $this;
	}

	/**
	 * State of the capture transaction.
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}


	/**
	 * ID of the Payment resource that this transaction is based on.
	 * @param string $parent_payment
	 */
	public function setParentPayment($parent_payment) {
		$this->parent_payment = $parent_payment;
		return $this;
	}

	/**
	 * ID of the Payment resource that this transaction is based on.
	 * @return string
	 */
	public function getParentPayment() {
		return $this->parent_payment;
	}

	/**
	 * Deprecated method
	 */
	public function setParent_payment($parent_payment) {
		$this->parent_payment = $parent_payment;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getParent_payment() {
		return $this->parent_payment;
	}

	/**
	 * 
	 * @array
	 * @param PayPal\Api\Links $links
	 */
	public function setLinks($links) {
		$this->links = $links;
		return $this;
	}

	/**
	 * 
	 * @return PayPal\Api\Links
	 */
	public function getLinks() {
		return $this->links;
	}



	public static function get($captureId, $apiContext = null) {
		if (($captureId == null) || (strlen($captureId) <= 0)) {
			throw new \InvalidArgumentException("captureId cannot be null or empty");
		}
		$payLoad = "";
		if ($apiContext == null) {
			$apiContext = new ApiContext(self::$credential);
		}
		$call = new \PPRestCall($apiContext);
		$json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/capture/$captureId", "GET", $payLoad);
		$ret = new Capture();
		$ret->fromJson($json);
		return $ret;
	}

	public function refund($refund, $apiContext = null) {
		if ($this->getId() == null) {
			throw new \InvalidArgumentException("Id cannot be null");
		}
		if (($refund == null)) {
			throw new \InvalidArgumentException("refund cannot be null or empty");
		}
		$payLoad = $refund->toJSON();
		if ($apiContext == null) {
			$apiContext = new ApiContext(self::$credential);
		}
		$call = new \PPRestCall($apiContext);
		$json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/capture/{$this->getId()}/refund", "POST", $payLoad);
		$ret = new Refund();
		$ret->fromJson($json);
		return $ret;
	}
}
