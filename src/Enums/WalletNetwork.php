<?php

namespace Alal\Client\Enums; 

enum WalletNetwork: string
{
    case mtn_ci = 'mtn-ci';
    case orange_money_ci = 'orange-money-ci';
    case wave_ci = 'wave-ci';
    case orange_money_sn = 'orange-money-sn';
    case wave_sn = 'wave-sn';
}