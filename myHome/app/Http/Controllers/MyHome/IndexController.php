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
         $dd = (new MyHomeBls())->getHanoi();
    }
}