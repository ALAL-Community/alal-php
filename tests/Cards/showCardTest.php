<?php
namespace Alal\Client\tests\Cards;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Options;

it('shoul show card by reference', function() {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock('Cards', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('showCards')
    ->with('792c6cf2-f5cf-46c8-bf8c-699a9028010e')
    ->andReturn(['data' => ['1000', 'physical', 'Visa', '1214', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'issued'], "message" => "ok", "statusCode" => "200"]);

    $result =  $alalSdkMock->showCards('792c6cf2-f5cf-46c8-bf8c-699a9028010e');
    
    expect($result)->toBe(['data' => ['1000', 'physical', 'Visa', '1214', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'issued'], "message" => "ok", "statusCode" => "200"]);

}); 