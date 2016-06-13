<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/13
 * Time: 15:46
 */

namespace App\Http\Controllers\Project;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $test = strlen('62024572-439c-46e2-816e-37f52534ef2d');
        dd($test);
    }
}