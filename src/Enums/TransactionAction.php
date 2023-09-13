<?php

namespace Alal\Client\Enums; 

enum TransctionAction: string
{
    case withdraw = 'withdraw';
    case recharge = 'recharge';
}