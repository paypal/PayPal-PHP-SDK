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
		return $this;
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
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getFragmentResolution() {
		return $this->fragmentResolution;
	}

	/**
	 * Deprecated method
	 */
	public function setFragmentresolution($fragmentResolution) {
		$this->fragmentResolution = $fragmentResolution;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getFragmentresolution() {
		return $this->fragmentResolution;
	}

	/**
	 * 
	 * @param boolean $readonly
	 */
	public function setReadonly($readonly) {
		$this->readonly = $readonly;
		return $this;
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
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getContentEncoding() {
		return $this->contentEncoding;
	}

	/**
	 * Deprecated method
	 */
	public function setContentencoding($contentEncoding) {
		$this->contentEncoding = $contentEncoding;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getContentencoding() {
		return $this->contentEncoding;
	}

	/**
	 * 
	 * @param string $pathStart
	 */
	public function setPathStart($pathStart) {
		$this->pathStart = $pathStart;
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getPathStart() {
		return $this->pathStart;
	}

	/**
	 * Deprecated method
	 */
	public function setPathstart($pathStart) {
		$this->pathStart = $pathStart;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getPathstart() {
		return $this->pathStart;
	}

	/**
	 * 
	 * @param string $mediaType
	 */
	public function setMediaType($mediaType) {
		$this->mediaType = $mediaType;
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getMediaType() {
		return $this->mediaType;
	}

	/**
	 * Deprecated method
	 */
	public function setMediatype($mediaType) {
		$this->mediaType = $mediaType;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getMediatype() {
		return $this->mediaType;
	}

}
