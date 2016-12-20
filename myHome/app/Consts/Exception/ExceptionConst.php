<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/8
 * Time: 10:33
 */

namespace App\Consts\Exception;


class ExceptionConst
{
    const SPRINT_MESSAGE_FIVE = '%s时出错：%s,位于文件：%s, 第%u行。错误码：%u';
    const SPRINT_MESSAGE_FOUR = '%s时出错：%s,位于文件：%s, 第%u行。';

    /**
     * 可以传单个数组，也可以逗号分隔传递参数
     * @return string
     */
    public static function format()
    {
        $args = func_get_args();
        $res = '';
        if (count($args) == 1 && is_array($args[0])) {
            foreach ($args as $arg) {
                if (is_array($arg) )
                    $res = self::choose($arg);
            }
        } else {
            $res = self::choose($args);
        }

        return $res;
    }

    private static function choose($args)
    {
        $res = '';
        switch(count($args)) {
            case 1:
                $res = sprintf(static::SPRINT_MESSAGE, $args[0]);
                break;
            case 2:
                $res = sprintf(static::SPRINT_MESSAGE, $args[0], $args[1]);
                break;
            case 3:
                $res = sprintf(static::SPRINT_MESSAGE, $args[0], $args[1], $args[2]);
                break;
            case 4:
                $res = sprintf(static::SPRINT_MESSAGE_FOUR, $args[0], $args[1], $args[2], $args[3]);
                break;
            case 5:
                $res = sprintf(static::SPRINT_MESSAGE_FIVE, $args[0], $args[1], $args[2], $args[3], $args[4]);
                break;
            case 6:
                $res = sprintf(static::SPRINT_MESSAGE, $args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
                break;
        }
        return $res;
    }
}