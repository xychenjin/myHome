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
        $compare = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $odd = [1, 3, 5, 7, 9,10];
        $even = [0, 2, 4, 6, 8];

        $compared = $this->compare($odd, $compare);

        $myhome = $this->mh_env();
        dd($myhome);
        
        return View::make('myhome.index',[]);
    }

    /**
     * 两个数组中比较出相同的，删除的，新加的
     *
     * @param $prev
     * @param $next
     * @return null|string
     */
    public function compare( $prev, $next ){
        if(! is_array($prev) || ! is_array($next) ){
            return null;
        }
        $compare = $prev;       //比较
        $compared = $next;      //被比较参数
        $unchangedCount = 0; //未改变
        $increasedCount = 0; //新增
        $increasedContent = ''; //新增内容
        $decreasedCount = 0; //减少
        $decreasedContent = ''; //减少内容

        //查找比较前者在后者中的数据情况
        foreach ( $compare as $val){
            $temp = $val;
            $tempUnchanged = true;
            foreach ($compared as $item => $vvv) {
                if ( $temp == $vvv ){
                    $unchangedCount++;
                    $tempUnchanged = true;
                    unset($compared[$item]);
                    break;
                }else{
                    $tempUnchanged = false;
                }
            }
            if ( ! $tempUnchanged ){
                $increasedCount++;
                $increasedContent .= $increasedContent !== '' ? ', '. $temp : $temp;
            }
        }

        if ( count($compared) ){
            $decreasedCount += count($compared);
            foreach($compared as $value){
                $decreasedContent .= $decreasedContent !== '' ? ', '. $value : $value ;
            }
        }

        return 'Unchanged: ' . $unchangedCount .', Increased: '
            . $increasedCount . ', '.($increasedContent ? '('. $increasedContent. ') ,':'').' Decreased: '
            . $decreasedCount .( $decreasedContent ? '('. $decreasedContent. ') .':' .');
    }

    public function mh_env()
    {
        $aaa = apache_setenv('ENV','hello ,I am Env');
        return $aaa;
    }

}