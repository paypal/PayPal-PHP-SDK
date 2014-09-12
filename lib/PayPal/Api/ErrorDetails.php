<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class ErrorDetails extends PPModel {
	/**
	 * Name of the field that caused the error.
	 *
	 * @param string $field
	 */
	public function setField($field) {
		$this->field = $field;
		return $this;
	}

	/**
	 * Name of the field that caused the error.
	 *
	 * @return string
	 */
	public function getField() {
		return $this->field;
	}


	/**
	 * Reason for the error.
	 *
	 * @param string $issue
	 */
	public function setIssue($issue) {
		$this->issue = $issue;
		return $this;
	}

	/**
	 * Reason for the error.
	 *
	 * @return string
	 */
	public function getIssue() {
		return $this->issue;
	}


}
