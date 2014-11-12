<?php

namespace PayPal\Rest;

use PayPal\Core\PPConfigManager;
use PayPal\Core\PPCredentialManager;

/**
 * Class ApiContext
 *
 * Call level parameters such as request id, credentials etc
 *
 * @package PayPal\Rest
 */
class ApiContext
{

    /**
     * Unique request id to be used for this call
     * The user can either generate one as per application
     * needs or let the SDK generate one
     *
     * @var null|string $requestId
     */
    private $requestId;

    /**
     * This is a placeholder for holding credential for the request
     * If the value is not set, it would get the value from @\PayPal\Core\PPCredentialManager
     *
     * @var \Paypal\Auth\OAuthTokenCredential
     */
    private $credential;


    /**
     * Construct
     *
     * @param \PayPal\Auth\OAuthTokenCredential $credential
     * @param string|null                       $requestId
     */
    public function __construct($credential = null, $requestId = null)
    {
        $this->requestId = $requestId;
        $this->credential = $credential;
    }

    /**
     * Get Credential
     *
     * @return \PayPal\Auth\OAuthTokenCredential
     */
    public function getCredential()
    {
        if ($this->credential == null) {
            return PPCredentialManager::getInstance()->getCredentialObject();
        }
        return $this->credential;
    }

    /**
     * Get Request ID
     *
     * @return string
     */
    public function getrequestId()
    {
        if ($this->requestId == null) {
            $this->requestId = $this->generateRequestId();
        }

        return $this->requestId;
    }

    /**
     * Resets the requestId that can be used to set the PayPal-request-id
     * header used for idempotency. In cases where you need to make multiple create calls
     * using the same ApiContext object, you need to reset request Id.
     *
     * @return string
     */
    public function resetRequestId()
    {
        $this->requestId = $this->generateRequestId();
        return $this->getrequestId();
    }

    /**
     * Sets Config
     *
     * @param array $config SDK configuration parameters
     */
    public function setConfig(array $config)
    {
        PPConfigManager::getInstance()->addConfigs($config);
    }

    /**
     * Gets Configurations
     *
     * @return array
     */
    public function getConfig()
    {
        return PPConfigManager::getInstance()->getConfigHashmap();
    }

    /**
     * Gets a specific configuration from key
     *
     * @param $searchKey
     * @return mixed
     */
    public function get($searchKey)
    {
        return PPConfigManager::getInstance()->get($searchKey);
    }

    /**
     * Generates a unique per request id that
     * can be used to set the PayPal-Request-Id header
     * that is used for idempotency
     *
     * @return string
     */
    private function generateRequestId()
    {
        static $pid = -1;
        static $addr = -1;

        if ($pid == -1) {
            $pid = getmypid();
        }

        if ($addr == -1) {
            if (array_key_exists('SERVER_ADDR', $_SERVER)) {
                $addr = ip2long($_SERVER['SERVER_ADDR']);
            } else {
                $addr = php_uname('n');
            }
        }

        return $addr . $pid . $_SERVER['REQUEST_TIME'] . mt_rand(0, 0xffff);
    }
}
