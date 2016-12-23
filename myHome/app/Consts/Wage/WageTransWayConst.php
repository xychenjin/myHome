<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/22
 * Time: 17:38
 */

namespace App\Consts\Wage;


class WageTransWayConst
{
    const WAY_UNKNOWN = 0;
    const WAY_TRANS_ONLINE_BLANK = 1;
    const WAY_TRANS_OFFLINE_ATM = 2;
    const WAY_TRANS_ALIPAY = 3;
    const WAY_TRANS_WX = 4;
    const WAY_TRANS_OTHER = 5;

    CONST WAY_UNKNOWN_DESC = '未知';
    CONST WAY_TRANS_ONLINE_BLANK_DESC = '网银';
    CONST WAY_TRANS_OFFLINE_ATM_DESC = 'ATM';
    CONST WAY_TRANS_ALIPAY_DESC = '支付宝';
    CONST WAY_TRANS_WX_DESC = '微信';
    CONST WAY_TRANS_OTHER_DESC = '其他';

    public static function ways()
    {
        return [
            static::WAY_TRANS_ONLINE_BLANK => static::WAY_TRANS_ONLINE_BLANK_DESC,
            static::WAY_TRANS_OFFLINE_ATM => static::WAY_TRANS_OFFLINE_ATM_DESC,
            static::WAY_TRANS_ALIPAY => static::WAY_TRANS_ALIPAY_DESC,
            static::WAY_TRANS_WX => static::WAY_TRANS_WX_DESC,
            static::WAY_TRANS_OTHER => static::WAY_TRANS_OTHER_DESC,
        ];
    }

    public static function desc($item)
    {
        return self::ways()[$item];
    }
}