<?php
namespace Alal\Client\tests\Cards;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Options;
use Alal\Client\Endpoint\Cards;
use Illuminate\Support\Facades\Http;

test('it should list cards with a valid page number', function () {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock($alalSdk);

    $alalSdkMock->shouldReceive('get')
    ->with('/cards?page=1')
    ->andReturn(json_encode(['data' => ['1000', 'physical', 'Visa', '1214', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'issued']]));

    $result =  $alalSdkMock->cards()->listCards(1);
    
    expect($result)->toBe(json_encode(['data' => ['1000', 'physical', 'Visa', '1214', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'issued']]));
});
