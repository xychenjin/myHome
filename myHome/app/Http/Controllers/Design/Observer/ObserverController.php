<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 10:55
 */

namespace App\Http\Controllers\Design\Observer;

use App\Bls\Design\Observer\UserList;
use App\Bls\Design\Observer\UserListLogger;
use App\Http\Controllers\Controller;

class ObserverController extends Controller
{
    /**
     * 观察者模式
     */
    public function observer()
    {
        $ul = new UserList();
        $ul->addObserver( new UserListLogger() );
        $ul->addCustomer( "Jack" );
    }
}