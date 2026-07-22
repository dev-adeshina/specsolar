<?php

namespace App\Enums;

enum AdminEnum
{
    case DEFAULTPASSWORD;
    case PERMISSION;
    case PORTAL;

    public function value(): string
    {
        return match ($this) {
            self::DEFAULTPASSWORD => 'Password123@',
            self::PERMISSION => 'permission',
            self::PORTAL => 'portal',
        };
    }
}
