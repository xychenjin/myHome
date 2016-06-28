<?php

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
        $name = str_replace('市', '', '上海市');
//        echo $name. "\n";
        
        return View::make('myhome.index',[]);
    }
}