<?php
declare(strict_types=1);

namespace Alal\Client;

use Alal\Client\ClientBuilder;
use Alal\Client\Endpoint\Cards;
use Alal\Client\Endpoint\Disputes;
use Alal\Client\Endpoint\CardUsers;
use Alal\Client\Endpoint\Transactions;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\HttpMethodsClientInterface;

class AlalSdk
{
    private ClientBuilder $clientBuilder;

    public function __construct(string $apikey, Options $options = null)
    {
        $options = $options ?? new Options();

        $this->clientBuilder = $options->getClientBuilder();
        $this->clientBuilder->addPlugin(new BaseUriPlugin($options->getUri()));
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'Authorization' => 'Bearer '.$apikey,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            )
        );
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }

    public function cards(): Cards
    {
        return new Endpoint\Cards($this); 
    }

    public function cardUsers(): CardUsers
    {
        return new Endpoint\CardUsers($this); 
    }

    public function disputes(): Disputes
    {
        return new Endpoint\Disputes($this); 
    }

    public function transactions(): Transactions
    {
        return new Endpoint\Transactions($this); 
    }
}