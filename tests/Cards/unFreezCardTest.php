<?php
namespace Alal\Client\tests\Cards;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Enums\CardBrand;
use Alal\Client\Enums\CardType;
use Alal\Client\Options;

it('should unFreez new card', function() {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock('Cards', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('unFreezCard')
    ->with('d282e4a6-1fb6-4827-a6ae-a780263287d7')
    ->andReturn(['data' => ['5000', 'Visa', 'virtual', 'issued', 'd282e4a6-1fb6-4827-a6ae-a780263287d7'], "message" => "OK", "statusCode" => "200"]);

    $result =  $alalSdkMock->unFreezCard('d282e4a6-1fb6-4827-a6ae-a780263287d7');

    expect($result)->toBe(['data' => ['5000', 'Visa', 'virtual', 'issued', 'd282e4a6-1fb6-4827-a6ae-a780263287d7'], "message" => "OK", "statusCode" => "200"]);
    

});