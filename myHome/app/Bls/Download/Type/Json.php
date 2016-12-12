<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/4 0004
 * Time: 下午 6:59
 */

namespace App\Bls\Download\Type;

class Json extends Type
{
    //Json文件的上层目录
    protected $path = 'json';

    //文件的扩展名
    protected $extension = '.json';

    //格式化文本输出格式
    protected function format(array $data)
    {
        return json_encode($data);
    }
}