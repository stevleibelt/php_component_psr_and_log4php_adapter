<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-13 
 */

namespace Net\Bazzline\Component\PsrAndLog4PhpAdapter;

use LoggerLevel;
use Psr\Log\LoggerInterface;

/**
 * Class Log4PhpToPsrLoggerAdapter
 *
 * @package Net\Bazzline\Component\PsrAndLog4PhpAdapter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-13
 */
class Log4PhpToPsrLoggerAdapter implements Log4PhpLoggerInterface
{
    /**
     * @var LoggerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-13
     */
    protected $psrLogger;

    /**
     * @param LoggerInterface $psrLogger
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-13
     */
    protected function setPsrLogger(LoggerInterface $psrLogger)
    {
        $this->psrLogger = $psrLogger;
    }

    /**
     * Log a message object with the DEBUG level.
     *
     * @param mixed $message message
     * @param \Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function debug($message, $throwable = null)
    {
        $this->log(LoggerLevel::DEBUG, $message, $throwable);
    }

    /**
     * Log a message object with the INFO Level.
     *
     * @param mixed $message message
     * @param \Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function info($message, $throwable = null)
    {
        $this->log(LoggerLevel::INFO, $message, $throwable);
    }

    /**
     * Log a message with the WARN level.
     *
     * @param mixed $message message
     * @param \Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function warn($message, $throwable = null)
    {
        $this->log(LoggerLevel::WARN, $message, $throwable);
    }

    /**
     * Log a message object with the ERROR level.
     *
     * @param mixed $message message
     * @param \Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function error($message, $throwable = null)
    {
        $this->log(LoggerLevel::ERROR, $message, $throwable);
    }

    /**
     * Log a message object with the FATAL level.
     *
     * @param mixed $message message
     * @param \Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function fatal($message, $throwable = null)
    {
        $this->log(LoggerLevel::FATAL, $message, $throwable);
    }

    /**
     * Log a message using the provided logging level.
     *
     * @param LoggerLevel $level The logging level.
     * @param mixed $message Message to log.
     * @param \Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function log(LoggerLevel $level, $message, $throwable = null)
    {
        switch ($level) {
            case LoggerLevel::DEBUG:
                $this->psrLogger->debug($message, $throwable);
                break;
            case LoggerLevel::INFO:
                $this->psrLogger->info($message, $throwable);
                break;
            case LoggerLevel::WARN:
                $this->psrLogger->warning($message, $throwable);
                break;
            case LoggerLevel::ERROR:
                $this->psrLogger->error($message, $throwable);
                break;
            case LoggerLevel::FATAL:
                $this->psrLogger->emergency($message, $throwable);
                break;
        }
    }
}
