<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-12
 */

namespace Net\Bazzline\Component\PsrAndLog4PhpAdapter;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Class PsrToLog4PhpAdapter
 *
 * @package Net\Bazzline\Component\ProxyLogger
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-12
 */
class PsrToLog4PhpAdapter implements LoggerInterface
{
    /**
     * @var Log4PhpLoggerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-12
     */
    protected $log4PhpLogger;



    /**
     * @param Log4PhpLoggerInterface $log4PhpLogger
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-12
     */
    protected function setLog4PhpLogger(Log4PhpLoggerInterface $log4PhpLogger)
    {
        $this->log4PhpLogger = $log4PhpLogger;
    }



    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }



    /**
     * Action must be taken immediately.
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }



    /**
     * Critical conditions.
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }



    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }



    /**
     * Exceptional occurrences that are not errors.
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }



    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }



    /**
     * Interesting events.
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }



    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }



    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        switch ($level) {
            case LogLevel::DEBUG:
                $this->log4PhpLogger->debug($message, $context);
                break;
            case LogLevel::INFO:
                $this->log4PhpLogger->info($message, $context);
                break;
            case LogLevel::WARNING:
                $this->log4PhpLogger->warn($message, $context);
                break;
            case LogLevel::ERROR:
                $this->log4PhpLogger->error($message, $context);
                break;
            case LogLevel::CRITICAL:
            case LogLevel::ALERT:
            case LogLevel::EMERGENCY:
                $this->log4PhpLogger->fatal($message, $context);
                break;
        }
    }
}