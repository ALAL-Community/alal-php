<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint\Business;

use Alal\Client\AlalSdk; 
use Alal\Client\HttpClient\Message\ResponseMediator;


final class Account
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/business'; 
    }


    public function getBalances()
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/balances"));
    }

    public function getOperations()
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/operations"));
    }


}