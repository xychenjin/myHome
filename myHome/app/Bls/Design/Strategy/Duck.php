<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 10:16
 */

namespace App\Bls\Design\Strategy;


use App\Bls\Design\IFC\FlyBehavior;

class Duck
{
    private $_flyBehavior;

    public function performFly()
    {
        $this->_flyBehavior->fly();
    }

    public function setFlyBehavior(FlyBehavior $flyBehavior)
    {
        $this->_flyBehavior = $flyBehavior;
    }
}