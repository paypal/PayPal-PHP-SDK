<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class Error extends PPModel {
	/**
	 * Human readable, unique name of the error.
	 *
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * Human readable, unique name of the error.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}


	/**
	 * PayPal internal identifier used for correlation purposes.
	 *
	 * @param string $debug_id
	 */
	public function setDebugId($debug_id) {
		$this->debug_id = $debug_id;
		return $this;
	}

	/**
	 * PayPal internal identifier used for correlation purposes.
	 *
	 * @return string
	 */
	public function getDebugId() {
		return $this->debug_id;
	}

	/**
	 * PayPal internal identifier used for correlation purposes.
	 *
	 * @param string $debug_id
	 * @deprecated. Instead use setDebugId
	 */
	public function setDebug_id($debug_id) {
		$this->debug_id = $debug_id;
		return $this;
	}
	/**
	 * PayPal internal identifier used for correlation purposes.
	 *
	 * @return string
	 * @deprecated. Instead use getDebugId
	 */
	public function getDebug_id() {
		return $this->debug_id;
	}

	/**
	 * Message describing the error.
	 *
	 * @param string $message
	 */
	public function setMessage($message) {
		$this->message = $message;
		return $this;
	}

	/**
	 * Message describing the error.
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}


	/**
	 * URI for detailed information related to this error for the developer.
	 *
	 * @param string $information_link
	 */
	public function setInformationLink($information_link) {
		$this->information_link = $information_link;
		return $this;
	}

	/**
	 * URI for detailed information related to this error for the developer.
	 *
	 * @return string
	 */
	public function getInformationLink() {
		return $this->information_link;
	}

	/**
	 * URI for detailed information related to this error for the developer.
	 *
	 * @param string $information_link
	 * @deprecated. Instead use setInformationLink
	 */
	public function setInformation_link($information_link) {
		$this->information_link = $information_link;
		return $this;
	}
	/**
	 * URI for detailed information related to this error for the developer.
	 *
	 * @return string
	 * @deprecated. Instead use getInformationLink
	 */
	public function getInformation_link() {
		return $this->information_link;
	}

	/**
	 * Additional details of the error
	 *
	 * @param PayPal\Api\ErrorDetails $details
	 */
	public function setDetails($details) {
		$this->details = $details;
		return $this;
	}

	/**
	 * Additional details of the error
	 *
	 * @return PayPal\Api\ErrorDetails
	 */
	public function getDetails() {
		return $this->details;
	}


}
