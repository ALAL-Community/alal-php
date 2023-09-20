<?php
namespace Alal\Client\tests\Disputes;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Options;

it('it should list cards disputes with a valid page number', function () {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);
    
    $alalSdkMock = Mockery::mock('Cards', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('listDisputes')
    ->with(1)
    ->andReturn((['data' => ["explanation" => "No real explanation even now", "reason" => "duplicate", "reference" => "962b954d-bbd3-4b03-8a70-80fb595e9049", "status" => "submitted", "transaction_reference" => "962b954d-bbd3-4b03-8a70"], "message" => "ok", "statusCode" => "200", [ "current_page" => "1", "from" => "1", "last_page" => "1", "per_page" => "20", "to" => "17", "total" => "17"]]));

    $result =  $alalSdkMock->listDisputes(1);
    
    expect($result)->toBe((['data' => ["explanation" => "No real explanation even now", "reason" => "duplicate", "reference" => "962b954d-bbd3-4b03-8a70-80fb595e9049", "status" => "submitted", "transaction_reference" => "962b954d-bbd3-4b03-8a70"], "message" => "ok", "statusCode" => "200", [ "current_page" => "1", "from" => "1", "last_page" => "1", "per_page" => "20", "to" => "17", "total" => "17"]]));
});
