<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18 0018
 * Time: 下午 9:54
 */

namespace App\Http\Controllers\Code;


use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function desc()
    {
        return \View::make('code.html');
    }

    public function test()
    {

    }
}