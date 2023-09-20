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

    $alalSdkMock->shouldReceive('createCards')
    ->with(CardBrand::visa, 'd282e4a6-1fb6-4827-a6ae-a780263287d7', CardType::virtual)
    ->andReturn(['data' => ['integer', 'Visa', 'virtual', 'issuing', 'd282e4a6-1fb6-4827-a6ae-a780263287d7'], "message" => "Card currently being generated", "statusCode" => "200"]);

    $result =  $alalSdkMock->createCards(CardBrand::visa, 'd282e4a6-1fb6-4827-a6ae-a780263287d7', CardType::virtual);

    expect($result)->toBe(['data' => ['integer', 'Visa', 'virtual', 'issuing', 'd282e4a6-1fb6-4827-a6ae-a780263287d7'], "message" => "Card currently being generated", "statusCode" => "200"]);
    

});