<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\Base;

use \Comodojo\Foundation\Base\ConfigurationLoader;
use \PHPUnit\Framework\TestCase;

class ConfigurationLoaderTest extends TestCase
{

    protected $config;

    protected function setUp(): void
    {
        $basepath = realpath(dirname(__FILE__) . "/../../../root/");
        $config_file = "$basepath/config/config.yml";

        $this->config = ConfigurationLoader::load($config_file, [
            'base-path' => $basepath,
        ]);
    }

    protected function tearDown(): void
    {
        unset($this->config);
    }

    public function testConfiguration()
    {
        $this->assertEquals(300, $this->config->get("routing-table-ttl"));
    }
}
