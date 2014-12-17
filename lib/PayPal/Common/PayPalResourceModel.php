<?php

namespace PayPal\Common;
use PayPal\Handler\IPayPalHandler;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Transport\PayPalRestCall;


/**
 * Class PayPalResourceModel
 * An Executable PayPalModel Class
 *
 * @package PayPal\Common
 */
class PayPalResourceModel extends PayPalModel implements IResource
{

    /**
     * OAuth Credentials to use for this call
     *
     * @var \PayPal\Auth\OAuthTokenCredential $credential
     */
    protected static $credential;

    /**
     * Sets Credential
     *
     * @deprecated Pass ApiContext to create/get methods instead
     * @param \PayPal\Auth\OAuthTokenCredential $credential
     */
    public static function setCredential($credential)
    {
        self::$credential = $credential;
    }


    /**
     * Execute SDK Call to Paypal services
     *
     * @param string      $url
     * @param string      $method
     * @param string      $payLoad
     * @param array $headers
     * @param ApiContext      $apiContext
     * @param PayPalRestCall      $restCall
     * @param array $handlers
     * @return string json response of the object
     */
    protected static function executeCall($url, $method, $payLoad, $headers = array(), $apiContext = null, $restCall = null, $handlers = array('PayPal\Handler\RestHandler'))
    {
        //Initialize the context and rest call object if not provided explicitly
        $apiContext = $apiContext ? $apiContext : new ApiContext(self::$credential);
        $restCall = $restCall ? $restCall : new PayPalRestCall($apiContext);

        //Make the execution call
        $json = $restCall->execute($handlers, $url, $method, $payLoad, $headers);
        return $json;
    }
} 
