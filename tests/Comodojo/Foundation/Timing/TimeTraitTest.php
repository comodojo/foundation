<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\Timing;

use \Comodojo\Foundation\Timing\TimeTrait;
use \PHPUnit\Framework\TestCase;

class TimeTraitTest extends TestCase
{

    use TimeTrait;

    public function testTime()
    {
        $time = time();
        $this->setTimestamp($time);
        $this->assertEquals($time, $this->getTimestamp());

        $datetime = $this->getTime();
        $this->assertEquals(0, $datetime->diff(date_create_from_format('U', (string) $time))->format('%s'));
    }
}
