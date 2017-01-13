<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/13
 * Time: 13:26
 */

namespace App\Consts\Bonus;


class BonusTypeConsts
{
    const TYPE_ORDINARY_BONUS = 1;
    const TYPE_LUCKY_BONUS = 2;
    const TYPE_ORIENTATION_BONUS = 3;

    const TYPE_ORDINARY_BONUS_DESC = '普通红包';
    const TYPE_LUCKY_BONUS_DESC = '手气红包';
    const TYPE_ORIENTATION_BONUS_DESC = '定向红包';

    public static function type()
    {
        return [
            static::TYPE_ORDINARY_BONUS => static::TYPE_ORDINARY_BONUS_DESC,
            static::TYPE_LUCKY_BONUS => static::TYPE_LUCKY_BONUS_DESC,
            static::TYPE_ORIENTATION_BONUS => static::TYPE_ORIENTATION_BONUS_DESC,
        ];
    }

    public static function desc($key)
    {
        return isset(self::type()[$key]) ? self::type()[$key] : '';
    }
}