<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/23
 * Time: 15:36
 */

namespace App\Library\Securimage\Facades;


use Illuminate\Support\Facades\Facade;

class Securimage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'securimage';
    }
}