<?php

namespace PayPal\Core;
use PayPal\Log\PayPalLogger;
use Psr\Log\LoggerInterface;

/**
 * Simple Logging Manager.
 * This does an error_log for now
 * Potential frameworks to use are PEAR logger, log4php from Apache
 */
class PayPalLoggingManager
{

    /**
     * Default Logging Level
     */
    const DEFAULT_LOGGING_LEVEL = 0;

    /**
     * Logger Name
     * @var string
     */
    private $loggerName;

    /**
     * Log Enabled
     *
     * @var bool
     */
    private $isLoggingEnabled;

    /**
     * Configured Logging Level
     *
     * @var int|mixed
     */
    private $loggingLevel;


    /**
     * The logger to be used for all messages
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Returns the singleton object
     *
     * @param string $loggerName
     * @return $this
     */
    public static function getInstance($loggerName = __CLASS__)
    {
        $instance = new self();
        $instance->setLoggerName($loggerName);
        return $instance;
    }

    /**
     * Sets Logger Name. Generally defaulted to Logging Class
     *
     * @param string $loggerName
     */
    public function setLoggerName($loggerName = __CLASS__)
    {
        $this->loggerName = $loggerName;
    }

    /**
     * Default Constructor
     */
    public function __construct()
    {
        $config = PayPalConfigManager::getInstance()->getConfigHashmap();
        $this->isLoggingEnabled = (array_key_exists('log.LogEnabled', $config) && $config['log.LogEnabled'] == '1');
        if ($this->isLoggingEnabled) {
            $loggingLevel = strtoupper($config['log.LogLevel']);
            $this->setupLogger($config);
            $this->loggingLevel =
                (isset($loggingLevel) && defined(__NAMESPACE__ . "\\PayPalLoggingLevel::$loggingLevel")) ?
                    constant(__NAMESPACE__ . "\\PayPalLoggingLevel::$loggingLevel") :
                    PayPalLoggingManager::DEFAULT_LOGGING_LEVEL;
        }
    }

    private function setupLogger($config = array()) {
        // Checks if custom adapter defined, and is it an implementation of @LoggerInterface
        $loggingAdapter = array_key_exists('log.Adapter', $config) && in_array('\Psr\Log\LoggerInterface', class_implements($config['log.Adapter']))? $config['log.Adapter'] : '\PayPal\Log\PayPalLogger';
        $this->logger = new $loggingAdapter();
    }


    /**
     * Log Error
     *
     * @param string $message
     */
    public function error($message)
    {
        if ($this->isLoggingEnabled && $this->loggingLevel >= PayPalLoggingLevel::ERROR) {
            $this->logger->error($message);
        }
    }

    /**
     * Log Warning
     *
     * @param string $message
     */
    public function warning($message)
    {
        if ($this->isLoggingEnabled && $this->loggingLevel >= PayPalLoggingLevel::WARN) {
            $this->logger->warning($message);
        }

    }

    /**
     * Log Info
     *
     * @param string $message
     */
    public function info($message)
    {
        if ($this->isLoggingEnabled && $this->loggingLevel >= PayPalLoggingLevel::INFO) {
            $this->logger->info($message);
        }
    }

    /**
     * Log Fine
     *
     * @param string $message
     */
    public function fine($message)
    {
        $this->info($message);
    }

    /**
     * Log Fine
     *
     * @param string $message
     */
    public function debug($message)
    {
        if ($this->isLoggingEnabled) {
            $config = PayPalConfigManager::getInstance()->getConfigHashmap();
            // Check if logging in live
            if (array_key_exists('mode', $config) && $config['mode'] == 'live' && $this->loggingLevel >= PayPalLoggingLevel::DEBUG) {
                $this->logger->error("Not allowed to keep 'Debug' level for Live Environments. Reduced to 'INFO'");
            } elseif (PayPalLoggingLevel::DEBUG <= $this->loggingLevel) {
                $this->logger->debug($message);
            }
        }
    }

}
