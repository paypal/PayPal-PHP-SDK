<?php 

namespace PayPal\Api;

/**
 * 
 */
class Link extends Resource {


	/**
	 * Setter for href
	 * @param string $href
	 */ 
	public function setHref($href) {
		$this->href = $href;
	}

	/**
	 * Getter for href
	 * @return string
	 */ 
	public function getHref() {
		return $this->href;
	}

	/**
	 * Setter for rel
	 * @param string $rel
	 */ 
	public function setRel($rel) {
		$this->rel = $rel;
	}

	/**
	 * Getter for rel
	 * @return string
	 */ 
	public function getRel() {
		return $this->rel;
	}

	/**
	 * Setter for method
	 * @param string $method
	 */ 
	public function setMethod($method) {
		$this->method = $method;
	}

	/**
	 * Getter for method
	 * @return string
	 */ 
	public function getMethod() {
		return $this->method;
	}


}