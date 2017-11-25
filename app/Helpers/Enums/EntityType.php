<?php

namespace App\Helpers\Enums;

use App\Helpers\Base\BaseEnum;

class EntityType extends BaseEnum
{
    const ROOM = 0;
    const AIRCON = 1;

    public static function getList()
    {
        return [
            self::ROOM,
            self::AIRCON,
        ];
    }

    public static function getString($val)
    {
        switch ($val) {
            case self::ROOM:
                return "Room";
            case self::AIRCON:
                return "Air Conditioner";
        }
    }
}
