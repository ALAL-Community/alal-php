<?php
namespace Alal\Client\tests\Transactions;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Enums\TransctionAction;
use Alal\Client\Options;

it('should create new transaction card', function() {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock('Transactions', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('createTransaction')
    ->with('recharge', 2000, '9c54515e-7890-44f9-8cc2-a85b80322b98')
    ->andReturn(['data' => ['2000', '2023-06-22T10:40:17.000000Z', '9c54515e-7890-44f9-8cc2-a85b80322b98', 'Any', 'b60f55b1-922a-406a-8417-g54atb0849ttb22c', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'pending'], "message" => "okay", "statusCode" => "200"]);

    $result =  $alalSdkMock->createTransaction('recharge', 2000, '9c54515e-7890-44f9-8cc2-a85b80322b98');

    expect($result)->toBe(['data' => ['2000', '2023-06-22T10:40:17.000000Z', '9c54515e-7890-44f9-8cc2-a85b80322b98', 'Any', 'b60f55b1-922a-406a-8417-g54atb0849ttb22c', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'pending'], "message" => "okay", "statusCode" => "200"]);
    
});