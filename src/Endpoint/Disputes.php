<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint;

use Alal\Client\AlalSdk;
use Alal\Client\Enums\DisputeReason;
use Alal\Client\HttpClient\Message\ResponseMediator;

final class Disputes
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/disputes';
    }

    public function listDisputes( int $page = 1): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri?page=$page"));
    }

    public function showDispute( string $reference ): array 
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/{$reference}")); 
    }

    public function createDispute( string $explanation, $transaction_reference, DisputeReason $reason ): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create", [], json_encode(compact('explanation', 'transaction_reference', 'reason')))); 
    }

    public function updateDispute( string $reference, $explanation, $transaction_reference, DisputeReason $reason ): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/update/{$reference}", [], json_encode(compact('explanation', 'transaction_reference', 'reason')))); 
    }

}