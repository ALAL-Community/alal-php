<?php
namespace Alal\Client\tests\CardUsers;

use Mockery;
use Alal\Client\AlalSdk;
use Alal\Client\Options;

it('shoul show card by reference', function() {

    $options = new Options('sandbox');
    $apikey = 'sk.8fcdc.a23474b7d2612534df';
    $alalSdk = new AlalSdk($apikey, $options);

    $alalSdkMock = Mockery::mock('CardUsers', ['alalSdk' => $alalSdk]);

    $alalSdkMock->shouldReceive('showCardUsers')
    ->with('792c6cf2-f5cf-46c8-bf8c-699a9028010e')
    ->andReturn(['data' => ['rue ng 59 grand ngor', '2023-06-22T11:07:07.000000Z', 'ndiayendeyengone99@gmail.com', 'ndeye ngone', '20119991010000621', 'ndiaye', '774964996', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'verified']]);

    $result =  $alalSdkMock->showCardUsers('792c6cf2-f5cf-46c8-bf8c-699a9028010e');
    
    expect($result)->toBe(['data' => ['rue ng 59 grand ngor', '2023-06-22T11:07:07.000000Z', 'ndiayendeyengone99@gmail.com', 'ndeye ngone', '20119991010000621', 'ndiaye', '774964996', '792c6cf2-f5cf-46c8-bf8c-699a9028010e', 'verified']]);

}); 