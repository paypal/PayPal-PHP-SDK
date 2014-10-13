<?php

namespace PayPal\Core;

use PayPal\Exception\PPConfigurationException;
use PayPal\Exception\PPConnectionException;

/**
 * A wrapper class based on the curl extension.
 * Requires the PHP curl module to be enabled.
 * See for full requirements the PHP manual: http://php.net/curl
 */
class PPHttpConnection
{

    /**
     * @var PPHttpConfig
     */
    private $httpConfig;

    /**
     * HTTP status codes for which a retry must be attempted
     * retry is currently attempted for Request timeout, Bad Gateway,
     * Service Unavailable and Gateway timeout errors.
     */
    private static $retryCodes = array('408', '502', '503', '504',);

    /**
     * LoggingManager
     *
     * @var PPLoggingManager
     */
    private $logger;

    /**
     * Default Constructor
     *
     * @param PPHttpConfig $httpConfig
     * @param array $config
     * @throws PPConfigurationException
     */
    public function __construct(PPHttpConfig $httpConfig, array $config)
    {
        if (!function_exists("curl_init")) {
            throw new PPConfigurationException("Curl module is not available on this system");
        }
        $this->httpConfig = $httpConfig;
        $this->logger = PPLoggingManager::getInstance(__CLASS__);
    }

    /**
     * Gets all Http Headers
     *
     * @return array
     */
    private function getHttpHeaders()
    {

        $ret = array();
        foreach ($this->httpConfig->getHeaders() as $k => $v) {
            $ret[] = "$k: $v";
        }
        return $ret;
    }

    /**
     * Executes an HTTP request
     *
     * @param string $data query string OR POST content as a string
     * @throws PPConnectionException
     */
    /**
     * Executes an HTTP request
     *
     * @param string $data query string OR POST content as a string
     * @return mixed
     * @throws PPConnectionException
     */
    public function execute($data)
    {
        //Initialize the logger
        $this->logger->fine("Connecting to " . $this->httpConfig->getUrl());
        $this->logger->fine("Payload " . $data);

        //Initialize Curl Options
        $ch = curl_init($this->httpConfig->getUrl());
        curl_setopt_array($ch, $this->httpConfig->getCurlOptions());
        curl_setopt($ch, CURLOPT_URL, $this->httpConfig->getUrl());
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHttpHeaders());
        //Determine Curl Options based on Method
        switch ($this->httpConfig->getMethod()) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
            case 'PUT':
            case 'PATCH':
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
        }
        //Default Option if Method not of given types in switch case
        if ($this->httpConfig->getMethod() != NULL) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->httpConfig->getMethod());
            $this->logger->info("Method : " . $this->httpConfig->getMethod());
        }

        //Logging Each Headers for debugging purposes
        foreach ($this->getHttpHeaders() as $header) {
            //TODO: Strip out credentials and other secure info when logging.
            $this->logger->info("Adding header $header");
        }

        //Execute Curl Request
        $result = curl_exec($ch);

        //Retry if Certificate Exception
        if (curl_errno($ch) == 60) {
            $this->logger->info("Invalid or no certificate authority found - Retrying using bundled CA certs file");
            curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
            $result = curl_exec($ch);
        }

        //Retrieve Response Status
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //Retry if Failing
        $retries = 0;
        if (in_array($httpStatus, self::$retryCodes) && $this->httpConfig->getHttpRetryCount() != null) {
            $this->logger->info("Got $httpStatus response from server. Retrying");
            do {
                $result = curl_exec($ch);
                $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            } while (in_array($httpStatus, self::$retryCodes) && (++$retries < $this->httpConfig->getHttpRetryCount()));
        }

        //Throw Exception if Retries and Certificates doenst work
        if (curl_errno($ch)) {
            $ex = new PPConnectionException(
                $this->httpConfig->getUrl(),
                curl_error($ch),
                curl_errno($ch)
            );
            curl_close($ch);
            throw $ex;
        }
        //Close the curl request
        curl_close($ch);
        //More Exceptions based on HttpStatus Code
        if (in_array($httpStatus, self::$retryCodes)) {
            $ex = new PPConnectionException(
                $this->httpConfig->getUrl(),
                "Got Http response code $httpStatus when accessing {$this->httpConfig->getUrl()}. " .
                "Retried $retries times."
            );
            $ex->setData($result);
            throw $ex;
        } else if ($httpStatus < 200 || $httpStatus >= 300) {
            $ex = new PPConnectionException(
                $this->httpConfig->getUrl(),
                "Got Http response code $httpStatus when accessing {$this->httpConfig->getUrl()}.",
                $httpStatus
            );
            $ex->setData($result);
            throw $ex;
        }

        //Return result object
        return $result;
    }

}
