<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/4 0004
 * Time: 下午 7:00
 */

namespace App\Bls\Download\Type;

class Csv extends Type
{
    //文件的上层目录
    protected $path = 'csv';

    //文件的扩展名
    protected $extension = '.csv';

    protected function format(array $data)
    {
        $res = '';
        while (list($key, $value) = each($data)) {
            switch (gettype($value)) {
                case 'object':
                    $res .= $this->format((array)$value);
                    break;
                case 'array':
                    $res .= is_numeric($key) ? '': $key .  ",";
                    $res .= $this->format($value);
                    break;
                case 'string':
                    $res .= is_numeric($key) ? iconv('UTF-8', 'GB2312//IGNORE', $value) ."\r\n" : $key .",".  iconv('UTF-8', 'GB2312//IGNORE', $value) ."\r\n";
                    break;
            }
        }
        return $res;
    }
}