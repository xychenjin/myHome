<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:51
 */

namespace App\Bls\Design\Demo\Factory\Operate;


use App\Bls\Design\IFC\IOperate;

class Division implements IOperate
{
    public function getValue($num, $num2)
    {
        // TODO: Implement getValue() method.

        if ($num2 == 0){
            throw new \Exception('不能被0整除');
        }
        return $num / $num2;
    }
}