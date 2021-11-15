<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\Events;

use \Comodojo\Foundation\Events\Manager;
use \League\Event\Emitter;
use \Monolog\Logger;
use \PHPUnit\Framework\TestCase;

class ManagerTest extends TestCase
{

    private static $events;

    public static function setupBeforeClass(): void
    {

        $logger = new Logger('test');

        self::$events = new Manager($logger);
    }

    public function testEmitter()
    {

        $this->assertInstanceOf('\League\Event\Emitter', self::$events);
        $this->assertInstanceOf('\Comodojo\Foundation\Events\Manager', self::$events);
    }
}
