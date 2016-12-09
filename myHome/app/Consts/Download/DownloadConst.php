<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/5
 * Time: 16:02
 */

namespace App\Consts\Download;


use App\Consts\BaseConsts;

class DownloadConst extends BaseConsts
{
    /**
     * 数据类型：默认结果集
     */
    const INSERT_TYPE = 'insert';
    const DEFAULT_TYPE = 'select';

    const INSERT_TYPE_DESC = '表插入型(INSERT)';
    const DEFAULT_TYPE_DESC = '仅结果集';

    public static function dataType()
    {
        return [
            static::INSERT_TYPE => static::INSERT_TYPE_DESC,
            static::DEFAULT_TYPE => static::DEFAULT_TYPE_DESC
        ];
    }

    public static function consts()
    {
        return [];
    }

    public function getDesc($item)
    {
        return array_get(static::consts(), $item);
    }

}