<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:24
 */

namespace App\Bls\Design\Demo\Observer\Notify;


/**
 * 抽象观察者
 *
 */
abstract class Observer
{
    protected $_UserName;

    protected $_Sub;

    public function __construct($Name,$Sub)
    {
        $this->_UserName = $Name;
        $this->_Sub = $Sub;
    }

    public abstract function Update(); //接收通过方法
}