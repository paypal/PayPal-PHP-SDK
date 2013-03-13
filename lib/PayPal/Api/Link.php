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
        return $this;
    }

    /**
     * Getter for href
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
        return $this;
    }

    /**
     * Getter for rel
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
        return $this;
    }

    /**
     * Getter for method
     */
    public function getMethod() {
        return $this->method;
    }

}