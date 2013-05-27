<?php
namespace PayPal\Api;


class Links extends \PPModel {
	/**
	 * 
	 * @param string $href
	 */
	public function setHref($href) {
		$this->href = $href;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getHref() {
		return $this->href;
	}
	
	/**
	 * 
	 * @param string $rel
	 */
	public function setRel($rel) {
		$this->rel = $rel;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getRel() {
		return $this->rel;
	}
	
	/**
	 * 
	 * @param PayPal\Api\HyperSchema $targetSchema
	 */
	public function setTargetSchema($targetSchema) {
		$this->targetSchema = $targetSchema;
	}	
	
	/**
	 * 
	 * @return PayPal\Api\HyperSchema
	 */
	public function getTargetSchema() {
		return $this->targetSchema;
	}
	
	/**
	 * 
	 * @param string $method
	 */
	public function setMethod($method) {
		$this->method = $method;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}
	
	/**
	 * 
	 * @param string $enctype
	 */
	public function setEnctype($enctype) {
		$this->enctype = $enctype;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getEnctype() {
		return $this->enctype;
	}
	
	/**
	 * 
	 * @param PayPal\Api\HyperSchema $schema
	 */
	public function setSchema($schema) {
		$this->schema = $schema;
	}	
	
	/**
	 * 
	 * @return PayPal\Api\HyperSchema
	 */
	public function getSchema() {
		return $this->schema;
	}
	
}
