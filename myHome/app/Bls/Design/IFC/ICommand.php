<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 11:21
 */

namespace App\Bls\Design\IFC;


interface ICommand
{
    public function onCommand( $name, $args );
}