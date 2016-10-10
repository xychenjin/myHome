<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 10:51
 */

namespace App\Bls\Design\Observer;


use App\Bls\Design\IFC\IObservable;

class UserList implements IObservable
{
    private $_observers = array();

    public function addCustomer( $name )
    {
        foreach( $this->_observers as $obs )
            $obs->onChanged( $this, $name );
    }

    public function addObserver( $observer )
    {
        $this->_observers []= $observer;
    }
}