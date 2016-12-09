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
}