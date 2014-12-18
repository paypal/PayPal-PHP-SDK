<?php
/**
 * API handler for OAuth Token Request REST API calls
 */

namespace PayPal\Rest;

use PayPal\Common\PPUserAgent;
use PayPal\Core\PPConstants;
use PayPal\Core\PPHttpConfig;
use PayPal\Exception\PPConfigurationException;
use PayPal\Exception\PPInvalidCredentialException;
use PayPal\Exception\PPMissingCredentialException;
use PayPal\Handler\IPPHandler;

/**
 * Class OauthHandler
 */
class OauthHandler implements IPPHandler
{
    /**
     * Private Variable
     *
     * @var \Paypal\Rest\ApiContext $apiContext
     */
    private $apiContext;

    /**
     * Construct
     *
     * @param \Paypal\Rest\ApiContext $apiContext
     */
    public function __construct($apiContext)
    {
        $this->apiContext = $apiContext;
    }

    /**
     * @param PPHttpConfig $httpConfig
     * @param string                    $request
     * @param mixed                     $options
     * @return mixed|void
     * @throws PPConfigurationException
     * @throws PPInvalidCredentialException
     * @throws PPMissingCredentialException
     */
    public function handle($httpConfig, $request, $options)
    {
        $config = $this->apiContext->getConfig();

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            (isset($options['path']) ? $options['path'] : '')
        );

        $headers = array(
            "User-Agent"    => PPUserAgent::getValue(PPConstants::SDK_NAME, PPConstants::SDK_VERSION),
            "Authorization" => "Basic " . base64_encode($options['clientId'] . ":" . $options['clientSecret']),
            "Accept"        => "*/*"
        );
        $httpConfig->setHeaders($headers);

        // Add any additional Headers that they may have provided
        $headers = $this->apiContext->getRequestHeaders();
        foreach ($headers as $key => $value) {
            $httpConfig->addHeader($key, $value);
        }
    }

    /**
     * Get HttpConfiguration object for OAuth API
     *
     * @param array $config
     *
     * @return PPHttpConfig
     * @throws \PayPal\Exception\PPConfigurationException
     */
    private static function _getEndpoint($config)
    {
        if (isset($config['oauth.EndPoint'])) {
            $baseEndpoint = $config['oauth.EndPoint'];
        } else if (isset($config['service.EndPoint'])) {
            $baseEndpoint = $config['service.EndPoint'];
        } else if (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    $baseEndpoint = PPConstants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    $baseEndpoint = PPConstants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new PPConfigurationException('The mode config parameter must be set to either sandbox/live');
            }
        } else {
            // Defaulting to Sandbox
            $baseEndpoint = PPConstants::REST_SANDBOX_ENDPOINT;
        }

        $baseEndpoint = rtrim(trim($baseEndpoint), '/') . "/v1/oauth2/token";

        return $baseEndpoint;
    }
}
