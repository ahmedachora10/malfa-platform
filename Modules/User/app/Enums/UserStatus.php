<?php

namespace Modules\User\App\Enums;

enum UserStatus:int
{
    case Blocked = 0;
    case Active = 1;

    public static function toArray() :array
    {
        return array_map(fn($item) => $item->value, self::cases());
    }
}