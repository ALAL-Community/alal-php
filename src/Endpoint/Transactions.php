<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint;

use Alal\Client\AlalSdk;
use Alal\Client\Enums\TransctionAction;
use Alal\Client\HttpClient\Message\ResponseMediator;

final class Transactions
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/transactions';
    }

    public function listTransactions( string $card_reference)
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri?card_reference=$card_reference"));
    }

    public function createTransaction( TransctionAction $action, string $card_reference, int $amount ): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create", [], json_encode(compact('action', 'card_reference', 'amount')))); 
    }

}