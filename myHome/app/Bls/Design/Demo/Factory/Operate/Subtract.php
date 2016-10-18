<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:48
 */

namespace App\Bls\Design\Demo\Factory\Operate;


use App\Bls\Design\IFC\IOperate;

class Subtract implements IOperate
{
    public function getValue($num, $num2)
    {
        // TODO: Implement getValue() method.
        return $num - $num2;
    }
}