<?php

namespace PayPal\Api;

/**
 * 
 */
class Capture extends Resource {

    /**
     * Setter for id
     * @param string $id
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
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
        return $this;
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
        return $this;
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
        return $this;
    }

    /**
     * Getter for state
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
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * Setter for parent_payment
     * @param string $parent_payment
     */
    public function setParent_payment($parent_payment) {
        $this->parent_payment = $parent_payment;
        return $this;
    }

    /**
     * Getter for parent_payment
     */
    public function getParent_payment() {
        return $this->parent_payment;
    }

    /**
     * Setter for authorization_id
     * @param string $authorization_id
     */
    public function setAuthorization_id($authorization_id) {
        $this->authorization_id = $authorization_id;
        return $this;
    }

    /**
     * Getter for authorization_id
     */
    public function getAuthorization_id() {
        return $this->authorization_id;
    }

    /**
     * Setter for description
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * Getter for description
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
        return $this;
    }

    /**
     * Getter for links
     */
    public function getLinks() {
        return $this->links;
    }

}