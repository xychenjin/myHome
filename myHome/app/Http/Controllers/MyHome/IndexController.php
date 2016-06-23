<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/7
 * Time: 13:38
 */

namespace App\Http\Controllers\MyHome;

use App\Bls\MyHome\MyHomeBls;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
//         $dd = (new MyHomeBls())->getIndex();
//         $dd = (new MyHomeBls())->getHanoi();
        $array = [1, 5, 3, 7, 4, 2, 1, 10];
         $dd = (new MyHomeBls())->quickSort($array);
         //dd($dd);
        $name = '上';
        echo $name. "\n";
        dd($name = str_replace('市', '', $name));
    }
}