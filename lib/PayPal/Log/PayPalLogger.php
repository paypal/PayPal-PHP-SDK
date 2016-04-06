<?php

namespace PayPal\Log;

use PayPal\Core\PayPalConfigManager;
use PayPal\Core\PayPalLoggingManager;
use Psr\Log\LoggerInterface;


class PayPalLogger implements LoggerInterface {

    /**
     * Default Logging Level
     */
    const DEFAULT_LOGGING_LEVEL = 0;

    /**
     * Configured Logging Level
     *
     * @var int|mixed
     */
    private $loggingLevel;

    /**
     * Configured Logging File
     *
     * @var string
     */
    private $loggerFile;

    public function initialize() {
            $config = PayPalConfigManager::getInstance()->getConfigHashmap();
        if (!empty($config)) {
            $this->loggerFile = ($config['log.FileName']) ? $config['log.FileName'] : ini_get('error_log');
            $loggingLevel = strtoupper($config['log.LogLevel']);
            $this->loggingLevel =
                (isset($loggingLevel) && defined(__NAMESPACE__ . "\\PayPalLoggingLevel::$loggingLevel")) ?
                    constant(__NAMESPACE__ . "\\PayPalLoggingLevel::$loggingLevel") :
                    PayPalLoggingManager::DEFAULT_LOGGING_LEVEL;
        }
    }

    public function emergency($message, array $context = array())
    {
        $this->error($message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->error($message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->error($message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->initialize();
        error_log("[" . date('d-m-Y h:i:s') . "] ERROR: $message\n", 3, $this->loggerFile);
    }

    public function warning($message, array $context = array())
    {
        $this->initialize();
        error_log("[" . date('d-m-Y h:i:s') . "] WARNING: $message\n", 3, $this->loggerFile);
    }

    public function notice($message, array $context = array())
    {
        $this->initialize();
        error_log("[" . date('d-m-Y h:i:s') . "] NOTICE: $message\n", 3, $this->loggerFile);
    }

    public function info($message, array $context = array())
    {
        $this->initialize();
        error_log("[" . date('d-m-Y h:i:s') . "] INFO: $message\n", 3, $this->loggerFile);
    }

    public function debug($message, array $context = array())
    {
        $this->initialize();
        error_log("[" . date('d-m-Y h:i:s') . "] DEBUG: $message\n", 3, $this->loggerFile);
    }

    public function log($level, $message, array $context = array())
    {
        $this->debug($message, $context);
    }
}