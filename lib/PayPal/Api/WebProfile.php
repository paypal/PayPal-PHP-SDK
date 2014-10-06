<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Transport\PPRestCall;


/**
 * Class WebProfile
 *
 * @property string                        id
 * @property string                        name
 * @property InputFields                   input_fields
 * @property FlowConfig                    flow_config
 * @property Presentation                  presentation
 */
class WebProfile extends PPModel implements IResource
{
    /**
     * @var
     */
    private static $credential;

    function __construct() {
        $this->input_fields =  new InputFields();
    }
    //private $input_fields = array();
    /**
     * Set ID
     * ID of the web experience profile.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get ID
     * ID of the web experience profile.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ID
     * Name of the web experience profile.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     * Name of the web experience profile.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }




    /**
     *
     * @param InputFields $input_fields
     */
    public function setInputFields($input_fields) {
        $this->input_fields = $input_fields;
        return $this;
    }

    /**
     *
     * @return InputFields
     */
    public function getInputFields() {
        return $this->input_fields;
    }


    /**
     *
     * @param FlowConfig $flow_config
     */
    public function setFlowConfig($flow_config) {
        $this->flow_config = $flow_config;
        return $this;
    }

    /**
     *
     * @return FlowConfig
     */
    public function getFlowConfig() {
        return $this->flow_config;
    }


    /**
     *
     * @param Presentation $presentation
     */
    public function setPresentation($presentation) {
        $this->presentation = $presentation;
        return $this;
    }

    /**
     *
     * @return Presentation
     */
    public function getPresentation() {
        return $this->presentation;
    }


    /**
     * Create
     *
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return $this
     */
    public function create($apiContext = null)
    {

        $payLoad = $this->toJSON();

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payment-experience/web-profiles", "POST", $payLoad);
        $this->fromJson($json);

        return $this;
    }

    public function update($apiContext = null)
    {
        $payLoad = $this->toJSON();

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);

        $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payment-experience/web-profiles/".$this->getId(), "PUT", $payLoad);
        return true;
    }

    /*
     * Delete WebProfile resource for the given identifier.
    *
    * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
    * @return void
    */
    public function delete($apiContext = null) {
        if ($this->getId() == null) {
            throw new \InvalidArgumentException("Id cannot be null");
        }
        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payment-experience/web-profiles/{$this->getId()}", "DELETE", $payLoad);
        return true;
    }

    /**
     * Get all webProfiles of a merchant.
     *
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return WebProfiles
     */
    public static function get_all($apiContext = null)
    {
        $payLoad = "";

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payment-experience/web-profiles", "GET", $payLoad);
        $json = '{"web_profiles":'.$json.'}';

        $ret = new WebProfiles();
        $ret->fromJson($json);
        return $ret;

    }



}
