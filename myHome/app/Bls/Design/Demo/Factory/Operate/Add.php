<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:44
 */

namespace App\Bls\Design\Demo\Factory\Operate;


use App\Bls\Design\IFC\IOperate;

class Add implements IOperate
{
    public function getValue($num, $num2)
    {
        return $num + $num2;
    }
}