<?php
namespace Alal\Client\tests\Disputes;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Options;

it('shoul show card disputes by reference', function() {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock('Disputes', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('showDispute')
    ->with('962b954d-bbd3-4b03-8a70-80fb595e9049')
    ->andReturn((['data' => ["explanation" => "No real explanation even now", "reason" => "duplicate", "reference" => "962b954d-bbd3-4b03-8a70-80fb595e9049", "status" => "submitted", "transaction_reference" => "962b954d-bbd3-4b03-8a70"], "message" => "ok", "statusCode" => "200"]));

    $result =  $alalSdkMock->showDispute('962b954d-bbd3-4b03-8a70-80fb595e9049');
    
    expect($result)->toBe((['data' => ["explanation" => "No real explanation even now", "reason" => "duplicate", "reference" => "962b954d-bbd3-4b03-8a70-80fb595e9049", "status" => "submitted", "transaction_reference" => "962b954d-bbd3-4b03-8a70"], "message" => "ok", "statusCode" => "200"]));

}); 