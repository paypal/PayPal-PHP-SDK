<?php
/**
 * API handler for all REST API calls
 */

namespace PayPal\Rest;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Common\PPUserAgent;
use PayPal\Core\PPConstants;
use PayPal\Core\PPCredentialManager;
use PayPal\Core\PPHttpConfig;
use PayPal\Exception\PPConfigurationException;
use PayPal\Exception\PPInvalidCredentialException;
use PayPal\Exception\PPMissingCredentialException;
use PayPal\Handler\IPPHandler;

/**
 * Class RestHandler
 */
class RestHandler implements IPPHandler
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

        $credential = $this->apiContext->getCredential();
        $config = $this->apiContext->getConfig();

        if ($credential == null) {
            // Try picking credentials from the config file
            $credMgr = PPCredentialManager::getInstance($config);
            $credValues = $credMgr->getCredentialObject();

            if (!is_array($credValues)) {
                throw new PPMissingCredentialException("Empty or invalid credentials passed");
            }

            $credential = new OAuthTokenCredential($credValues['clientId'], $credValues['clientSecret']);
        }

        if ($credential == null || !($credential instanceof OAuthTokenCredential)) {
            throw new PPInvalidCredentialException("Invalid credentials passed");
        }

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            (isset($options['path']) ? $options['path'] : '')
        );

        if (!array_key_exists("User-Agent", $httpConfig->getHeaders())) {
            $httpConfig->addHeader("User-Agent", PPUserAgent::getValue(PPConstants::SDK_NAME, PPConstants::SDK_VERSION));
        }

        if (!is_null($credential) && $credential instanceof OAuthTokenCredential && is_null($httpConfig->getHeader('Authorization'))) {
            $httpConfig->addHeader('Authorization', "Bearer " . $credential->getAccessToken($config), false);
        }

        if ($httpConfig->getMethod() == 'POST' || $httpConfig->getMethod() == 'PUT') {
            $httpConfig->addHeader('PayPal-Request-Id', $this->apiContext->getRequestId());
        }
    }

    /**
     * End Point
     *
     * @param array $config
     *
     * @return string
     * @throws \PayPal\Exception\PPConfigurationException
     */
    private function _getEndpoint($config)
    {
        if (isset($config['service.EndPoint'])) {
            return $config['service.EndPoint'];
        } else if (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    return PPConstants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    return PPConstants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new PPConfigurationException('The mode config parameter must be set to either sandbox/live');
                    break;
            }
        } else {
            throw new PPConfigurationException(
                'You must set one of service.endpoint or mode parameters in your configuration'
            );
        }
    }
}
