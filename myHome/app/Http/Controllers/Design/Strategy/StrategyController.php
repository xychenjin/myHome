<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 11:14
 */

namespace App\Http\Controllers\Design\Strategy;

use App\Bls\Design\Strategy\UserList;
use App\Bls\Design\Strategy\FindAfterStrategy;
use App\Bls\Design\Strategy\RandomStrategy;
use App\Http\Controllers\Controller;

class StrategyController extends Controller
{
    /**
     * 策略模式
     *
     *
     */
    public function strategy()
    {
        $ul = new UserList( array( "Andy", "Jack", "Lori", "Megan" ) );
        $f1 = $ul->find( new FindAfterStrategy( "J" ) );
        print_r( $f1 );

        $f2 = $ul->find( new RandomStrategy() );
        print_r( $f2 );
    }

}