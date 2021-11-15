<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\Timing;

use \Comodojo\Foundation\Timing\TimingTrait;
use \PHPUnit\Framework\TestCase;

class TimingTest extends TestCase
{

    use TimingTrait;

    public function testTiming()
    {

        $time = microtime(true);

        $this->setTiming($time);

        $this->assertEquals($time, $this->getTiming());
    }
}
