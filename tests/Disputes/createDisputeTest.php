<?php
namespace Alal\Client\tests\Disputes;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Enums\CardBrand;
use Alal\Client\Enums\CardType;
use Alal\Client\Enums\DisputeReason;
use Alal\Client\Options;

it('should create new card dispute', function() {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock('Disputes', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('createDispute')
    ->with('No real explanation even now', DisputeReason::duplicate ,'d282e4a6-1fb6-4827-a6ae-a780263287d7')
    ->andReturn((['data' => ["explanation" => "No real explanation even now", "reason" => "duplicate", "reference" => "962b954d-bbd3-4b03-8a70-80fb595e9049", "status" => "submitted", "transaction_reference" => "962b954d-bbd3-4b03-8a70"], "message" => "dispute successfully created!", "statusCode" => "200"]));

    $result =  $alalSdkMock->createDispute('No real explanation even now', DisputeReason::duplicate ,'d282e4a6-1fb6-4827-a6ae-a780263287d7');

    expect($result)->toBe((['data' => ["explanation" => "No real explanation even now", "reason" => "duplicate", "reference" => "962b954d-bbd3-4b03-8a70-80fb595e9049", "status" => "submitted", "transaction_reference" => "962b954d-bbd3-4b03-8a70"], "message" => "dispute successfully created!", "statusCode" => "200"]));
    

});