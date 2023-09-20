<?php
namespace Alal\Client\tests\Cards;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Options;
use Alal\Client\Endpoint\Cards;
use Illuminate\Support\Facades\Http;

it('it should list cards with a valid page number', function () {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);
    
    $alalSdkMock = Mockery::mock('Cards', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('listCards')
    ->with(1)
    ->andReturn(['data' => ['1000', 'physical', 'Visa', '1214', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'issued'], "message" => "ok", "statusCode" => "200", "meta" => [ "current_page" => "1", "from" => "1", "last_page" => "1", "per_page" => "20", "to" => "17", "total" => "17"]]);

    $result =  $alalSdkMock->listCards(1);
    
    expect($result)->toBe(['data' => ['1000', 'physical', 'Visa', '1214', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'issued'], "message" => "ok", "statusCode" => "200", "meta" => [ "current_page" => "1", "from" => "1", "last_page" => "1", "per_page" => "20", "to" => "17", "total" => "17"]]);
});
