<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\Mock;

use \Comodojo\Foundation\Base\AbstractVersion;

class Version extends AbstractVersion
{

    protected string $name = 'Heart of Gold';
    protected string $description = 'The first spacecraft to make use of the Infinite Improbability Drive';
    protected string $version = '42';
    protected string $ascii = "/r/n                       _    __         /r/n" .
        "|_| _  _  ___|_    _ _|_   /__ _  |  _|/r/n" .
        "| |(/_(_| |  |_   (_) |    \_|(_) | (_|/r/n";

    protected string $fullVersionTemplate = "{name} + {description} + {version}";
    protected string $prefix = 'mock-';
}
