<?php
namespace PayPal\Transport;

use PayPal\Core\PPLoggingManager;
use PayPal\Core\PPHttpConfig;
use PayPal\Core\PPHttpConnection;

/**
 * Class PPRestCall
 *
 * @package PayPal\Transport
 */
class PPRestCall
{


    /**
     * Paypal Logger
     *
     * @var PPLoggingManager logger interface
     */
    private $logger;

    /**
     * API Context
     *
     * @var \Paypal\Rest\ApiContext
     */
    private $apiContext;


    /**
     * Default Constructor
     *
     * @param \Paypal\Rest\ApiContext $apiContext
     */
    public function __construct(\Paypal\Rest\ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->logger = new PPLoggingManager(__CLASS__, $apiContext->getConfig());
    }

    /**
     * @param array  $handlers Array of handlers
     * @param string $path     Resource path relative to base service endpoint
     * @param string $method   HTTP method - one of GET, POST, PUT, DELETE, PATCH etc
     * @param string $data     Request payload
     * @param array  $headers  HTTP headers
     * @return mixed
     * @throws \PayPal\Exception\PPConnectionException
     */
    public function execute($handlers = array(), $path, $method, $data = '', $headers = array())
    {

        $config = $this->apiContext->getConfig();
        $httpConfig = new PPHttpConfig(null, $method);
        $httpConfig->setHeaders($headers +
            array(
                'Content-Type' => 'application/json'
            )
        );

        /** @var \Paypal\Handler\IPPHandler $handler */
        foreach ($handlers as $handler) {
            if (!is_object($handler)) {
                $fullHandler = "\\" . (string)$handler;
                $handler = new $fullHandler($this->apiContext);
            }
            $handler->handle($httpConfig, $data, array('path' => $path, 'apiContext' => $this->apiContext));
        }
        $connection = new PPHttpConnection($httpConfig, $config);
        $response = $connection->execute($data);
        $this->logger->fine($response);

        return $response;
    }

}
