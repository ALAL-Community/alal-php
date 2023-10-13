<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint;

use Alal\Client\AlalSdk;
use Alal\Client\Enums\CardType;
use Alal\Client\Enums\CardBrand;
use Alal\Client\HttpClient\Message\ResponseMediator;

final class Cards
{
    private AlalSdk $sdk;
    private string $baseUri;

    public function __construct(AlalSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/cards';
    }

    public function listCards( int $page = 1): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri?page=$page"));
    }

    public function showCard( string $reference = null ): array 
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/{$reference}")); 
    }

    public function createCard( CardBrand $card_brand, string $card_user_reference, CardType $card_type ): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create", [], json_encode(compact('card_brand', 'card_type', 'card_user_reference')))); 
    }

    public function freezeCard(string $reference): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/freeze", [], json_encode(compact('reference'))));
    }

    public function unFreezeCard(string $reference): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/unfreeze", [], json_encode(compact('reference'))));
    }

    public function linkCard(string $reference, $card_user_reference): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/link", [], json_encode(compact('reference', 'card_user_reference'))));
    }

    public function getAccessToken( string $css_url, $reference ): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/auth/access_token", [], json_encode(compact('css_url', 'reference')))); 
    }

   
}