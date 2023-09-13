<?php

namespace Alal\Client\Enums; 

enum DisputeReason: string
{
    case duplicate = 'duplicate';
    case not_received = 'not_received';
    case fraudulent = 'fraudulent';
    case product_not_as_described = 'product_not_as_described';
    case service_not_as_described = 'service_not_as_described';
    case canceled = 'canceled';
    case other = 'other';
}