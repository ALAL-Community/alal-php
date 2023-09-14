<?php

declare(strict_types=1);

namespace Alal\Client\Tests;

use Bitnob\Client\ClientBuilder;
use Bitnob\Client\Options;
use Bitnob\Client\BitnobSdk;
use Http\Mock\Client;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Client $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new Client();
    }

    protected function givenSdk(): BitnobSdk
    {
        return new BitnobSdk('', new Options('dev', [
            'client_builder' => new ClientBuilder($this->mockClient),
        ]));
    }
}
