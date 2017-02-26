<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-13 
 */

namespace Net\Bazzline\Component\PsrAndLog4PhpAdapter;

use Exception;
use Logger;
use LoggerLevel;
use Psr\Log\LoggerInterface;

/**
 * Class Log4PhpToPsrLoggerAdapter
 *
 * @package Net\Bazzline\Component\PsrAndLog4PhpAdapter
 */
class Log4PhpToPsrLoggerAdapter extends Logger
{
    /** @var LoggerInterface */
    private $psrLogger;

    /**
     * Log4PhpToPsrLoggerAdapter constructor.
     *
     * @param LoggerInterface $psrLogger
     */
    public function injectPsrLogger(LoggerInterface $psrLogger)
    {
        $this->psrLogger    = $psrLogger;
    }


    /**
     * Log a message object with the TRACE level.
     *
     * @param mixed $message message
     * @param Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function trace($message, $throwable = null)
    {
        $this->log(LoggerLevel::getLevelTrace(), $message, $throwable);
    }

    /**
     * Log a message object with the DEBUG level.
     *
     * @param mixed $message message
     * @param Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function debug($message, $throwable = null)
    {
        $this->log(LoggerLevel::getLevelDebug(), $message, $throwable);
    }

    /**
     * Log a message object with the INFO Level.
     *
     * @param mixed $message message
     * @param Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function info($message, $throwable = null)
    {
        $this->log(LoggerLevel::getLevelInfo(), $message, $throwable);
    }

    /**
     * Log a message with the WARN level.
     *
     * @param mixed $message message
     * @param Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function warn($message, $throwable = null)
    {
        $this->log(LoggerLevel::getLevelWarn(), $message, $throwable);
    }

    /**
     * Log a message object with the ERROR level.
     *
     * @param mixed $message message
     * @param Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function error($message, $throwable = null)
    {
        $this->log(LoggerLevel::getLevelError(), $message, $throwable);
    }

    /**
     * Log a message object with the FATAL level.
     *
     * @param mixed $message message
     * @param Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function fatal($message, $throwable = null)
    {
        $this->log(LoggerLevel::getLevelFatal(), $message, $throwable);
    }

    /**
     * Log a message using the provided logging level.
     *
     * @param LoggerLevel $level The logging level.
     * @param mixed $message Message to log.
     * @param Exception $throwable Optional throwable information to include
     *   in the logging event.
     */
    public function log(LoggerLevel $level, $message, $throwable = null)
    {
        switch ($level->toInt()) {
            case LoggerLevel::TRACE:
            case LoggerLevel::DEBUG:
                $this->psrLogger->debug($message);
                break;
            case LoggerLevel::INFO:
                $this->psrLogger->info($message);
                break;
            case LoggerLevel::WARN:
                $this->psrLogger->warning($message);
                break;
            case LoggerLevel::ERROR:
                $this->psrLogger->error($message);
                break;
            case LoggerLevel::FATAL:
                $this->psrLogger->emergency($message);
                break;
        }
    }
}
