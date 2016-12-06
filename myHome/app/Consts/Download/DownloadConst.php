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


    public static function consts()
    {
        return [];
    }

    public function getDesc($item)
    {
        return array_get(static::consts(), $item);
    }

}