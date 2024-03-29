<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\Logging;

use \Comodojo\Foundation\Base\Configuration;
use \Comodojo\Foundation\Logging\Manager;
use \PHPUnit\Framework\TestCase;

class ManagerTest extends TestCase
{

    protected static $local_config = [
        "log" => [
            "name" => "test",
            "providers" => [
                "test" => [
                    "type" => "StreamHandler",
                    "stream" => "log/log_manager_test.log",
                    "level" => "debug",
                ],
            ],
        ],
    ];

    public function testLocal()
    {

        $config = array_merge(self::$local_config, array(
            "base-path" => realpath(dirname(__FILE__) . "/../../../root/"),
        ));

        $configuration = new Configuration($config);

        $file = $configuration->get("base-path") . "/log/log_manager_test.log";

        @unlink($file);

        $manager = Manager::createFromConfiguration($configuration);

        $logger = $manager->getLogger();

        $logger->debug('this is a test');

        $this->assertFileExists($file);

        $content = file_get_contents($file);

        $this->assertStringEndsWith("test.DEBUG: this is a test [] []\n", $content);
    }
}
