<?php

namespace App\Helpers\Enums;

use App\Helpers\Base\BaseEnum;

class UserStatus extends BaseEnum
{
    const ACTIVE = 0;
    const SUSPENDED = 1;

    public static function getList()
    {
        return [
            self::ACTIVE,
            self::SUSPENDED
        ];
    }

    public static function getString($val)
    {
        switch ($val) {
            case self::ACTIVE:
                return 'Active';
            case self::SUSPENDED:
                return 'Suspended';
        }
    }
}
