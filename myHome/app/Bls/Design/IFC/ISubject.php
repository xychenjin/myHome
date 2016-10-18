<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:17
 */

namespace App\Bls\Design\IFC;

interface ISubject
{
    public function Attach($Observer); //添加观察者

    public function Detach($Observer); //踢出观察者

    public function Notify(); //满足条件时通知观察者

    public function SubjectState($Subject); //观察条件

}