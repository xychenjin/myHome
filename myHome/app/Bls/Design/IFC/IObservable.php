<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 10:50
 */

namespace App\Bls\Design\IFC;


interface IObservable
{
    public function addObserver( $observer );
}