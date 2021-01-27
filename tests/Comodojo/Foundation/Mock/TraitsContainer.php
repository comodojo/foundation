<?php namespace Comodojo\Foundation\Tests\Mock;

use \Comodojo\Foundation\Base\ConfigurationTrait;
use \Comodojo\Foundation\Events\EventsTrait;
use \Comodojo\Foundation\Logging\LoggerTrait;
use \PHPUnit\Framework\TestCase;

class TraitsContainer extends TestCase {

    use ConfigurationTrait;
    use EventsTrait;
    use LoggerTrait;

}
