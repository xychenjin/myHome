<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/13
 * Time: 13:32
 */

namespace App\Consts\Bonus;


class BonusLimitConsts
{
    /**
     * 保存key前缀
     */
    const BONUS_PREFIX = 'bonus_key_';

    /*
     * 普通红包上线
     */
    const LIMIT_ORDINARY_MAX = 200;

    /**
     * 手气红包上限
     */
    const LIMIT_LUCKY_MAX = 2000;

    /**
     * 定向红包上线
     */
    const LIMIT_ORIENTATION_MAX = 20000;
}