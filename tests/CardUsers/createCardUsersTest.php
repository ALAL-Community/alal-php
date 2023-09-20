<?php
namespace Alal\Client\tests\CardUsers;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Enums\CardBrand;
use Alal\Client\Enums\CardType;
use Alal\Client\Options;

it('should create new card', function() {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock('Cards', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('createCardUsers')
    ->with('rue ng 59 grand ngor', '2023-06-22T11:07:07.000000Z', 'ndiayendeyengone99@gmail.com', 'ndeye ngone', '20119991010000621', 'ndiaye', '774964996', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'verified')
    ->andReturn(['data' => ['rue ng 59 grand ngor', '2023-06-22T11:07:07.000000Z', 'ndiayendeyengone99@gmail.com', 'ndeye ngone', '20119991010000621', 'ndiaye', '774964996', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'verified'], "message" => "Card User verification in progress", "statusCode" => "200"]);

    $result =  $alalSdkMock->createCardUsers('rue ng 59 grand ngor', '2023-06-22T11:07:07.000000Z', 'ndiayendeyengone99@gmail.com', 'ndeye ngone', '20119991010000621', 'ndiaye', '774964996', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'verified');

    expect($result)->toBe(['data' => ['rue ng 59 grand ngor', '2023-06-22T11:07:07.000000Z', 'ndiayendeyengone99@gmail.com', 'ndeye ngone', '20119991010000621', 'ndiaye', '774964996', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'verified'], "message" => "Card User verification in progress", "statusCode" => "200"]);
    

});