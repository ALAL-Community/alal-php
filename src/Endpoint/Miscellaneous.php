<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint;

use Alal\Client\AlalSdk;
use Alal\Client\Enums\CountryCode;
use Alal\Client\HttpClient\Message\ResponseMediator;


final class CardUsers
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/phone/verify';
    }

    public function miscellaneous(string $phone, CountryCode $country_code): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri", [], json_encode(compact('phone', 'country_code'))));
    }
}