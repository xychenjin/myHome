<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 10:23
 */

namespace App\Bls\Design\Demo\Strategy\Duck;


use App\Bls\Design\IFC\FlyBehavior;

class FlyWithWings implements FlyBehavior
{
    public function fly()
    {
       echo 'Duck flies with wings';
    }
}