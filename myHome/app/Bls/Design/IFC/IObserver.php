<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 10:49
 */

namespace App\Bls\Design\IFC;


interface IObserver
{
    public function onChanged( $sender, $args );
}