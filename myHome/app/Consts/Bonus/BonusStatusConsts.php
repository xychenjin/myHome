<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/13
 * Time: 13:18
 */

namespace App\Consts\Bonus;


class BonusStatusConsts
{
    const STATUS_ENABLE_CONST = 1;
    const STATUS_EMPTY_CONST = 2;
    const STATUS_EXPIRE_CONST = 3;
    const STATUS_CANCEL_CONST = 4;

    const STATUS_ENABLE_CONST_DESC = '有效';
    const STATUS_EMPTY_CONST_DESC = '已抢完';
    const STATUS_EXPIRE_CONST_DESC = '已过期';
    const STATUS_CANCEL_CONST_DESC = '已撤回';

    public static function status()
    {
        return [
            static::STATUS_ENABLE_CONST => static::STATUS_ENABLE_CONST_DESC,
            static::STATUS_EMPTY_CONST => static::STATUS_EMPTY_CONST_DESC,
            static::STATUS_EXPIRE_CONST => static::STATUS_EXPIRE_CONST_DESC,
            static::STATUS_CANCEL_CONST => static::STATUS_CANCEL_CONST_DESC,
        ];
    }

    public static function desc($key)
    {
        return isset(self::status()[$key]) ? self::status()[$key] : '';
    }
}