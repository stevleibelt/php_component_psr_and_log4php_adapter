<?php
/**
 * @author sleibelt
 * @since 2013-09-12
 */

namespace Net\Bazzline\Component\PsrAndLog4PhpAdapter;

/**
 * Class Log4PhpLoggerInterface
 * Taken from: https://git-wip-us.apache.org/repos/asf?p=logging-log4php.git;a=blob_plain;f=src/main/php/Logger.php;hb=HEAD
 *
 * @package Net\Bazzline\Component\ProxyLogger
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-12
 */
interface Log4PhpLoggerInterface
{
	/**
	 * Log a message object with the DEBUG level.
	 *
	 * @param mixed $message message
 	 * @param \Exception $throwable Optional throwable information to include
	 *   in the logging event.
	 */
	public function debug($message, $throwable = null);

	/**
	 * Log a message object with the INFO Level.
	 *
	 * @param mixed $message message
 	 * @param \Exception $throwable Optional throwable information to include
	 *   in the logging event.
	 */
	public function info($message, $throwable = null);

	/**
	 * Log a message with the WARN level.
	 *
	 * @param mixed $message message
  	 * @param \Exception $throwable Optional throwable information to include
	 *   in the logging event.
	 */
	public function warn($message, $throwable = null);

	/**
	 * Log a message object with the ERROR level.
	 *
	 * @param mixed $message message
	 * @param \Exception $throwable Optional throwable information to include
	 *   in the logging event.
	 */
	public function error($message, $throwable = null);

	/**
	 * Log a message object with the FATAL level.
	 *
	 * @param mixed $message message
	 * @param \Exception $throwable Optional throwable information to include
	 *   in the logging event.
	 */
	public function fatal($message, $throwable = null);
}