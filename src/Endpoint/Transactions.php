<?php

declare(strict_types=1);

namespace Alal\Client\Endpoint;

use Alal\Client\AlalSdk;
use Alal\Client\Enums\BankName;
use Alal\Client\Enums\TransctionAction;
use Alal\Client\Enums\WalletNetwork;
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

    public function showTransaction( string $reference = null ): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri/{$reference}")); 
    }

    public function createCardToBank( int $amount, string $card_reference, string $bank_id, BankName $bank_name, string $account_name, string $description): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create/card-to-bank", [], json_encode(compact('amount', 'card_reference', 'bank_id', 'bank_id', 'bank_name', 'account_name', 'description')))); 
    }

    public function createCardToWallet( int $amount, string $card_reference, string $phone, WalletNetwork $network): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create/card-to-wallet", [], json_encode(compact('amount', 'card_reference', 'phone', 'network')))); 
    }

    public function createWalletToCard( int $amount, string $card_reference, string $phone, WalletNetwork $network, string $code = null): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/create/wallet-to-card", [], json_encode(compact('amount', 'card_reference', 'phone', 'network', 'code')))); 
    }

}