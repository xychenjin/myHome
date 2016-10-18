<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:25
 */

namespace App\Bls\Design\Demo\Observer\Notify;


/**
 * 观察者
 */
class StockObserver extends Observer
{
    public function __construct($name,$sub)
    {
        parent::__construct($name,$sub);
    }

    public function Update()
    {
        echo $this->_Sub->_action.$this->_UserName." 你赶快跑...";
    }
}