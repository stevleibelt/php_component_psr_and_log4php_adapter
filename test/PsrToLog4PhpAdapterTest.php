<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2017-02-26
 */
namespace Test\Net\Bazzline\Component\PsrAndLog4PhpAdapter;

use Logger;
use Mockery;
use Net\Bazzline\Component\PsrAndLog4PhpAdapter\PsrToLog4PhpAdapter;
use PHPUnit_Framework_TestCase;

class PsrToLog4PhpAdapterTest extends PHPUnit_Framework_TestCase
{
    /** @var Mockery\MockInterface|Logger */
    private $mockOfTheLog4PhpLogger;

    protected function setUp()
    {
        $this->mockOfTheLog4PhpLogger   = Mockery::mock('Logger');
    }

    protected function tearDown()
    {
        Mockery::close();
    }

    public function testLog()
    {
        //begin of dependencies
        $logAdapter = $this->getNewAdapter();
        $logger     = $this->mockOfTheLog4PhpLogger;
        //end of dependencies

        //begin of test setup
        $logger->shouldReceive('debug')
            ->with('debug log')
            ->once();
        $logger->shouldReceive('debug')
            ->with('notice log')
            ->once();
        $logger->shouldReceive('info')
            ->with('info log')
            ->once();
        $logger->shouldReceive('warn')
            ->with('warning log')
            ->once();
        $logger->shouldReceive('error')
            ->with('error log')
            ->once();
        $logger->shouldReceive('fatal')
            ->with('alert log')
            ->once();
        $logger->shouldReceive('fatal')
            ->with('critical log')
            ->once();
        $logger->shouldReceive('fatal')
            ->with('emergency log')
            ->once();
        //end of test setup

        //begin of test
        $logAdapter->debug('debug log');
        $logAdapter->notice('notice log');
        $logAdapter->info('info log');
        $logAdapter->warning('warning log');
        $logAdapter->error('error log');
        $logAdapter->alert('alert log');
        $logAdapter->critical('critical log');
        $logAdapter->emergency('emergency log');
        //end of test
    }

    /**
     * @return PsrToLog4PhpAdapter
     */
    private function getNewAdapter()
    {
        return new PsrToLog4PhpAdapter(
            $this->mockOfTheLog4PhpLogger
        );
    }
}