<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/23
 * Time: 14:22
 */

namespace App\Consts\Card;


class CardStatusConst
{
    const CARD_STATUS_ENABLE = 1;
    const CARD_STATUS_DISABLE = 2;
    const CARD_STATUS_EXPIRE = 3;

    const CARD_STATUS_ENABLE_DESC = '启用';
    const CARD_STATUS_DISABLE_DESC = '停用';
    const CARD_STATUS_EXPIRE_DESC = '过期';

    public static function status()
    {
        return [
            static::CARD_STATUS_ENABLE => static::CARD_STATUS_ENABLE_DESC,
            static::CARD_STATUS_DISABLE => static::CARD_STATUS_DISABLE_DESC,
            static::CARD_STATUS_EXPIRE => static::CARD_STATUS_EXPIRE_DESC,
        ];
    }

    public static function desc($item)
    {
        return self::status()[$item];
    }
}