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

    public function createCardUser(string $first_name, string $last_name, string $address, string $phone, string $email, string $id_no, string $selfie_image, string $id_image, string $back_id_image): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create", [], json_encode(compact('first_name', 'last_name', 'address', 'phone', 'email', 'id_no', 'selfie_image', 'id_image', 'back_id_image')))); 
    }

    public function resubmitCardUser(string $card_user_reference, string $first_name, string $last_name, string $address, string $phone, string $email, string $id_no, string $selfie_image, string $id_image, string $back_id_image): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/resubmit", [], json_encode(compact('card_user_reference', 'first_name', 'last_name', 'address', 'phone', 'email', 'id_no', 'selfie_image', 'id_image', 'back_id_image')))); 
    }
}