<?php

namespace PayPal\Core;

/**
 * Simple Logging Manager.
 * This does an error_log for now
 * Potential frameworks to use are PEAR logger, log4php from Apache
 */
class PPLoggingManager
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
     * Configured Logging File
     *
     * @var string
     */
    private $loggerFile;

    /**
     * @param      $loggerName
     * @param array|null $config
     */
    public function __construct($loggerName, $config = null)
    {
        $this->loggerName = $loggerName;
        $config = PPConfigManager::getInstance()->getConfigHashmap();

        $this->isLoggingEnabled = (array_key_exists('log.LogEnabled', $config) && $config['log.LogEnabled'] == '1');

        if ($this->isLoggingEnabled) {
            $this->loggerFile = ($config['log.FileName']) ? $config['log.FileName'] : ini_get('error_log');
            $loggingLevel = strtoupper($config['log.LogLevel']);
            $this->loggingLevel =
                (isset($loggingLevel) && defined(__NAMESPACE__ . "\\PPLoggingLevel::$loggingLevel")) ?
                constant(__NAMESPACE__ . "\\PPLoggingLevel::$loggingLevel") :
                PPLoggingManager::DEFAULT_LOGGING_LEVEL;
        }
    }

    /**
     * Default Logger
     *
     * @param string $message
     * @param int $level
     */
    private function log($message, $level = PPLoggingLevel::INFO)
    {
        if ($this->isLoggingEnabled && ($level <= $this->loggingLevel)) {
            error_log($this->loggerName . ": $message\n", 3, $this->loggerFile);
        }
    }

    /**
     * Log Error
     *
     * @param string $message
     */
    public function error($message)
    {
        $this->log($message, PPLoggingLevel::ERROR);
    }

    /**
     * Log Warning
     *
     * @param string $message
     */
    public function warning($message)
    {
        $this->log($message, PPLoggingLevel::WARN);
    }

    /**
     * Log Info
     *
     * @param string $message
     */
    public function info($message)
    {
        $this->log($message, PPLoggingLevel::INFO);
    }

    /**
     * Log Fine
     *
     * @param string $message
     */
    public function fine($message)
    {
        $this->log($message, PPLoggingLevel::FINE);
    }

}
