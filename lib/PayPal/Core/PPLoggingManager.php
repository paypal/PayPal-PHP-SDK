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
        // To suppress the warning during the date() invocation in logs, we would default the timezone to GMT.
        if (!ini_get('date.timezone')) {
            date_default_timezone_set('GMT');
        }

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
            error_log("[" .  date('d-m-Y h:i:s') . "] " . $this->loggerName . ": $message\n", 3, $this->loggerFile);
        }
    }

    /**
     * Log Error
     *
     * @param string $message
     */
    public function error($message)
    {
        $this->log('ERROR: ' . $message, PPLoggingLevel::ERROR);
    }

    /**
     * Log Warning
     *
     * @param string $message
     */
    public function warning($message)
    {
        $this->log('WARNING: ' . $message, PPLoggingLevel::WARN);
    }

    /**
     * Log Info
     *
     * @param string $message
     */
    public function info($message)
    {
        $this->log('INFO: ' . $message, PPLoggingLevel::INFO);
    }

    /**
     * Log Fine
     *
     * @param string $message
     */
    public function fine($message)
    {
        $this->log('FINE: ' . $message, PPLoggingLevel::FINE);
    }

}
