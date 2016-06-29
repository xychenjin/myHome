<?php

namespace App\Http\Controllers\MyHome;

use App\Bls\MyHome\MyHomeBls;
use App\Http\Controllers\Controller;
use View;

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
        echo 'this is my git checkout test'."\n";
        echo 'git help'."\n";
        echo 'git show '."\n";
        echo 'git chekcout -- '."\n";
        echo 'git chekcout .'."\n";
        echo 'git add '."\n";//将修改提交到本地暂存区
        echo 'git add .'."\n";//将修改提交到本地暂存区
        echo 'git rm'."\n";//从版本库中删除文件

        return View::make('myhome.index',[]);
    }
}