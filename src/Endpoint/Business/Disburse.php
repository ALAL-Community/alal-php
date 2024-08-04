<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint\Business;

use Alal\Client\AlalSdk;
use Alal\Client\Enums\WalletNetwork;
use Alal\Client\Attribut\CustomerAttribut;
use Alal\Client\HttpClient\Message\ResponseMediator;


final class Disburse
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/disburses'; 
    }

    public function createDisburse(int $amount, WalletNetwork $network, string $partner_reference, CustomerAttribut $customer): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create", [], json_encode(compact('amount', 'partner_reference', 'customer', 'network'))));
    }

    public function listOfDisburses(): array 
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri"));   
    }

    public function showDisburses(string $reference): array 
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/{$reference}"));   
    }


}