<?php
namespace PayPal\Api;


class HyperSchema extends \PPModel {
	/**
	 * 
	 * @array
	 * @param PayPal\Api\Links $links
	 */
	public function setLinks($links) {
		$this->links = $links;
	}	
	
	/**
	 * 
	 * @return PayPal\Api\Links
	 */
	public function getLinks() {
		return $this->links;
	}
	
	/**
	 * 
	 * @param string $fragmentResolution
	 */
	public function setFragmentResolution($fragmentResolution) {
		$this->fragmentResolution = $fragmentResolution;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getFragmentResolution() {
		return $this->fragmentResolution;
	}
	
	/**
	 * 
	 * @param boolean $readonly
	 */
	public function setReadonly($readonly) {
		$this->readonly = $readonly;
	}	
	
	/**
	 * 
	 * @return boolean
	 */
	public function getReadonly() {
		return $this->readonly;
	}
	
	/**
	 * 
	 * @param string $contentEncoding
	 */
	public function setContentEncoding($contentEncoding) {
		$this->contentEncoding = $contentEncoding;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getContentEncoding() {
		return $this->contentEncoding;
	}
	
	/**
	 * 
	 * @param string $pathStart
	 */
	public function setPathStart($pathStart) {
		$this->pathStart = $pathStart;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getPathStart() {
		return $this->pathStart;
	}
	
	/**
	 * 
	 * @param string $mediaType
	 */
	public function setMediaType($mediaType) {
		$this->mediaType = $mediaType;
	}	
	
	/**
	 * 
	 * @return string
	 */
	public function getMediaType() {
		return $this->mediaType;
	}
	
}
