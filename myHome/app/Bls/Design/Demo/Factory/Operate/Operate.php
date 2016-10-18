<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:40
 */

namespace App\Bls\Design\Demo\Factory\Operate;

class Operate
{
    private $_obj;

    public function __construct($rules)
    {
        switch($rules){
            case '+':
                $this->_obj = new Add();
                break;
            case '-':
                $this->_obj = new Subtract();
                break;
            case '*':
                $this->_obj = new Multiply();
                break;
            case '/':
                $this->_obj = new Division();
                break;
            default:
                throw new \Exception('参数错误');
        }
    }

    public function getValue($num, $num2)
    {
        return $this->_obj->getValue($num, $num2);
    }
}