<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/2
 * Time: 14:51
 */

namespace App\Consts\Connect;


use App\Consts\BaseConsts;

class ConnectConst extends BaseConsts
{
    const SERVER_CLOSED = 2002;
    const CANNOT_CONNECT = 2003;
    const NO_GRANT = 1 ;
    const NO_PASSWORD = 2;
    const PASSWORD_WRONG = 3;

    const SERVER_CLOSED_DESC = '远端服务器未开启';//SQLSTATE[HY000] [2002] ..
    const CANNOT_CONNECT_DESC = '不能连接上，或远端服务器未响应';//ERROR 2003 (HY000): Can't connect to MySQL server on '127.0.0.1' (10065)
    const NO_GRANT_DESC = '未授权用户空密码登录';//ERROR 1045 (28000): Access denied for user 'userName'@'127.0.0.1' (using password: NO)
    const NO_PASSWORD_DESC = '禁止空密码登录';//ERROR 1045 (28000): Access denied for user 'userName'@'127.0.0.1' (using password: NO)
    const PASSWORD_WRONG_DESC = '用户名或密码错误';//ERROR 1045 (28000): Access denied for user 'userName'@'127.0.0.1' (using password: YES)

    public static function consts()
    {
        return [
            static::CANNOT_CONNECT => static::CANNOT_CONNECT_DESC,
            static::NO_GRANT => static::NO_GRANT_DESC,
            static::NO_PASSWORD => static::NO_PASSWORD_DESC,
            static::PASSWORD_WRONG => static::PASSWORD_WRONG_DESC,
        ];
    }

    public function getDesc($item)
    {
        return array_get(static::consts(), $item);
    }

    public static function getMessage($message)
    {
        switch (true) {
            case str_contains($message,'SQLSTATE[HY000] [2002]'):
                return static::CANNOT_CONNECT_DESC;
            case str_contains($message, '2003') && str_contains($message, 'Can\'t connect to MySQL server'):
                return static::CANNOT_CONNECT_DESC;
            case str_contains($message, 'Access denied') && str_contains($message, 'using password: NO'):
                return static::NO_GRANT_DESC;
            case str_contains($message, 'Access denied') && str_contains($message, 'using password: YES'):
                return static::PASSWORD_WRONG_DESC;
        }
        return $message;
    }
}