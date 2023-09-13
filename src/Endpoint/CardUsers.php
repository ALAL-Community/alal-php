<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint;

use Alal\Client\AlalSdk;
use Alal\Client\HttpClient\Message\ResponseMediator;

final class CardUsers
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/card-users';
    }

    public function listCardUsers( int $page = 1): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri?page=$page"));
    }

    public function showCardUser( string $reference ): array 
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/{$reference}")); 
    }

    public function createCardUser( array $data ): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create", [], json_encode($data))); 
    }
}