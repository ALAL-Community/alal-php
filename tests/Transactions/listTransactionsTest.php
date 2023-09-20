<?php
namespace Alal\Client\tests\Transactions;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Options;
use Alal\Client\Endpoint\Cards;
use Illuminate\Support\Facades\Http;

it('it should list transactions cards with a valid page number', function () {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);
    
    $alalSdkMock = Mockery::mock('Transactions', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('listTransactions')
    ->with('9c54515e-7890-44f9-8cc2-a85b80322b98')
    ->andReturn(['data' => ['1000', '9c54515e-7890-44f9-8cc2-a85b80322b98', '2023-06-22T11:07:07.000000Z', 'recharge', 'Any', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'success'], "message" => "ok", "statusCode" => "200", "meta" => [ "current_page"=> "1", "from"=> "1", "last_page"=> "1", "per_page"=> "20", "to"=> "17", "total"=> "17"]]);

    $result =  $alalSdkMock->listTransactions('9c54515e-7890-44f9-8cc2-a85b80322b98');
    
    expect($result)->toBe(['data' => ['1000', '9c54515e-7890-44f9-8cc2-a85b80322b98', '2023-06-22T11:07:07.000000Z', 'recharge', 'Any', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'success'], "message" => "ok", "statusCode" => "200", "meta" => [ "current_page"=> "1", "from"=> "1", "last_page"=> "1", "per_page"=> "20", "to"=> "17", "total"=> "17"]]);
});
