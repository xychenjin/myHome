<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 10:25
 */

namespace App\Bls\Design\Demo\Strategy\Duck;


use App\Bls\Design\IFC\FlyBehavior;

class FlyWithNo implements FlyBehavior
{
    public function fly()
    {
        echo 'Duck flies with No';
    }
}