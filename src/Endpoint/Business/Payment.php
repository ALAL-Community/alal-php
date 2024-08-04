<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint\Business;

use Alal\Client\AlalSdk;
use Alal\Client\Enums\WalletNetwork;
use Alal\Client\Attribut\CustomerAttribut;
use Alal\Client\HttpClient\Message\ResponseMediator;

final class Payments
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/payments'; 
    }

    public function createPayment(int $amount, string $partner_reference, WalletNetwork $network, CustomerAttribut $customer)
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create", [], json_encode(compact('amount', 'partner_reference', 'customer', 'network'))));
    }


    public function listOfPayment()
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri"));
    }

    public function showPayment(string $reference)
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/{reference}"));
    }

}
