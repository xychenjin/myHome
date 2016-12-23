<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/23
 * Time: 14:22
 */

namespace App\Consts\Card;


class CardTypeConst
{
    const CARD_TYPE_COMMON = 1;
    const CARD_TYPE_VIP = 2;
    const CARD_TYPE_SUPER = 3;

    const CARD_TYPE_COMMON_DESC = '通用卡';
    const CARD_TYPE_VIP_DESC = 'VIP卡';
    const CARD_TYPE_SUPER_DESC = '超级卡';

    public static function type()
    {
        return [
            static::CARD_TYPE_COMMON => static::CARD_TYPE_COMMON_DESC,
            static::CARD_TYPE_VIP => static::CARD_TYPE_VIP_DESC,
            static::CARD_TYPE_SUPER => static::CARD_TYPE_SUPER_DESC,
        ];
    }

    public static function desc($item)
    {
        return self::type()[$item];
    }
}