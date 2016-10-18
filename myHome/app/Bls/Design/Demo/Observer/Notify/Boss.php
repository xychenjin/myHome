<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 11:23
 */

namespace App\Bls\Design\Demo\Observer\Notify;


use App\Bls\Design\IFC\ISubject;

class Boss implements ISubject
{
    public $_action;

    private $_Observer;

    public function Attach($Observer)
    {
        $this->_Observer[] = $Observer;
    }

    public function Detach($Observer)
    {
        $ObserverKey = array_search($Observer, $this->_Observer);

        if($ObserverKey !== false)
        {
            unset($this->_Observer[$ObserverKey]);
        }
    }

    public function Notify()
    {
        foreach($this->_Observer as $value )
        {
            $value->Update();
        }
    }

    public function SubjectState($Subject)
    {
        $this->_action = $Subject;
    }
}