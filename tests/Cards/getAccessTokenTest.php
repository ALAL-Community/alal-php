<?php
namespace Alal\Client\tests\Cards;

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

    $alalSdkMock->shouldReceive('getAccessToken')
    ->with('style.css', 'd282e4a6-1fb6-4827-a6ae-a780263287d7')
    ->andReturn(json_encode(['data' => ['N72VeyZQ8dmn3a0Wk0blu2a1pjFjdcNOx2Ec5bm39pFGa33gGu', 'https://sandbox.saalal.com/embedded-card-reveal/test_Q347N1z2kHuUTlrUPoYR1rSsmkl1FbiY5GhN8TAwBtqdvqo1QB']]));

    $result =  $alalSdkMock->getAccessToken('style.css', 'd282e4a6-1fb6-4827-a6ae-a780263287d7');

    expect($result)->toBe(json_encode(['data' => ['N72VeyZQ8dmn3a0Wk0blu2a1pjFjdcNOx2Ec5bm39pFGa33gGu', 'https://sandbox.saalal.com/embedded-card-reveal/test_Q347N1z2kHuUTlrUPoYR1rSsmkl1FbiY5GhN8TAwBtqdvqo1QB']]));
    

});