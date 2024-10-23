<?php

namespace Modules\User\Enums;

use App\Traits\EnumToArray;
use App\Traits\HasLabel;

enum UserStatus:string
{
    use HasLabel, EnumToArray;
    case Blocked = '0';
    case Active = '1';


    public function color() {
        return match ($this) {
            self::Blocked => 'danger',
            self::Active => 'primary',
        };
    }
}
