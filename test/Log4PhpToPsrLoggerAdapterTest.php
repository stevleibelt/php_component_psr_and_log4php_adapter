<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2017-02-26
 */
namespace Test\Net\Bazzline\Component\PsrAndLog4PhpAdapter;

use Mockery;
use Mockery\MockInterface;
use Net\Bazzline\Component\PsrAndLog4PhpAdapter\Log4PhpToPsrLoggerAdapter;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerInterface;

class Log4PhpToPsrLoggerAdapterTest extends PHPUnit_Framework_TestCase
{
    /** @var MockInterface|LoggerInterface */
    private $mockOfThePsrLogger;

    protected function setUp()
    {
        $this->mockOfThePsrLogger   = Mockery::mock('Psr\Log\LoggerInterface');
    }

    protected function tearDown()
    {
        Mockery::close();
    }

    public function testLog()
    {
        //begin of dependencies
        $logAdapter = $this->getNewAdapter();
        $logger     = $this->mockOfThePsrLogger;
        //end of dependencies

        //begin of test setup
        $logger->shouldReceive('debug')
            ->with('trace log')
            ->once();
        $logger->shouldReceive('debug')
            ->with('debug log')
            ->once();
        $logger->shouldReceive('info')
            ->with('info log')
            ->once();
        $logger->shouldReceive('warning')
            ->with('warn log')
            ->once();
        $logger->shouldReceive('error')
            ->with('error log')
            ->once();
        $logger->shouldReceive('emergency')
            ->with('fatal log')
            ->once();
        //end of test setup

        //begin of test
        $logAdapter->trace('trace log');
        $logAdapter->debug('debug log');
        $logAdapter->info('info log');
        $logAdapter->warn('warn log');
        $logAdapter->error('error log');
        $logAdapter->fatal('fatal log');
        //end of test
    }

    /**
     * @return Log4PhpToPsrLoggerAdapter
     */
    private function getNewAdapter()
    {
        $logger = new Log4PhpToPsrLoggerAdapter('foo');
        $logger->injectPsrLogger($this->mockOfThePsrLogger);

        return $logger;
    }
}