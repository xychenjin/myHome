<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 10:52
 */

namespace App\Bls\Design\Observer;


use App\Bls\Design\IFC\IObserver;

class UserListLogger implements IObserver
{
    public function onChanged( $sender, $args )
    {
        echo( "'$args' added to user list\n" );
    }
}