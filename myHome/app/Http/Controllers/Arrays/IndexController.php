<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/8
 * Time: 13:58
 */

namespace App\Http\Controllers\Arrays;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class IndexController extends Controller
{

    public function testArray()
    {
        $arrayColumn = array_column( self::ArrayColumn(), 'first_name', 'id');    //返回数组中指定的一列并以ID作为KEY值
//        dd($arrayColumn);
        $arrayChunk = array_chunk(self::ArrayChunk(),3);    //将一个数组分割成多个
//        dd($arrayChunk);
        $arrayCombine = $this->arrayCombine();  //数组合并
//        dd($arrayCombine);
        $arrayCountValue = array_count_values($this->arrayCountValue()); //统计值的个数
//        dd($arrayCountValue);
        $arrayDiffAssoc = $this->arrayDiffAssoc(); //统计值得个数
//        dd($arrayDiffAssoc);
        $arrayDiffKey = $this->arrayDiffKey();//返回一个数组，该数组包括了所有出现在 array1 中但是未出现在任何其它参数数组中的键名的值。
//        dd($arrayDiffKey);
        $arrayDiff = $this->arrayDiff();//返回一个数组，对比返回在 array1 中但是不在 array2 及任何其它参数数组中的值。
//        dd($arrayDiff);
        $arrayFillKeys = $this->arrayFillKeys();    //使用指定的键和值填充数组
//        dd($arrayFillKeys);
        $arrayFill = $this->arrayFill();    //用给定的值填充数组
//        dd($arrayFill);
        $arrayFilter = $this->arrayFilter(); //用回调函数过滤数组中的单元
//        dd($arrayFilter);
        $arrayFlip = $this->arrayFlip(); //交换数组的键和值，返回到新数组中
//        dd($arrayFlip);
//        $arrayWalk = $this->arrayWalk();    //使用用户自定义函数对数组中的每个元素做回调处理
//        dd($arrayWalk);
        $arrayMap = $this->arrayMap();      //将回调函数作用到给定数组的单元上
//        dd($arrayMap);
        $arrayCompact = $this->arrayCompact();  //建立一个数组，包括变量名和它们的值
//        dd($arrayCompact);
        $arraySortBy = $this->getSortBy();  //框架排序
//        dd($arraySortBy);
        $arrayMap = $this->getMap();    //框架回调函数
        dd($arrayMap);
    }

    /**
     * @return array
     */
    public static function arrayColumn()
    {
        return [
            ['id'=>1, 'first_name' => 'jim', 'last_name' => 'chen'],
            ['id'=>2, 'first_name' => 'jim2', 'last_name' => 'chen2'],
            ['id'=>3, 'first_name' => 'jim3', 'last_name' => 'chen3'],
        ];
    }

    /**
     * @return array
     */
    public static function arrayChunk()
    {
        return [
            1,2,3,4,5,6,7,8,9,10,11,12,13
        ];
    }

    /**
     * @name 创建数组以A键值B值为输出
     * @return array
     */
    public static function arrayCombine()
    {
        $a = array('green', 'red', 'yellow');
        $b = array(['avocado', 'apple'],'', ['banana']);
        $c = array_combine($a, $b);
        return $c;
    }

    /**
     * @name 统计数组中值出现的次数
     * @return array
     */
    public static function arrayCountValue()
    {
        return [
            1,'hello',2,'hello',3,'world'
        ];
    }

    /**
     * @name 带索引检查计算数组的差集
     * @return array
     */
    public static function arrayDiffAssoc()
    {
        $array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
        $array2 = array("a" => "green", "yellow", "red");
        $result = array_diff_assoc($array1, $array2);
        return $result;
    }

    /**
     * @name 比较两个数组间不同键值对
     * @return array
     */
    public function arrayDiffKey()
    {
        $array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
        $array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
        return array_diff_key( $array1, $array2 );
    }

    /**
     * @name 返回array1中的数组在array2及其他参数中不存在的值
     * @return array
     */
    public function arrayDiff()
    {
        $array1 = array("a" => "green", "red", "blue", "red");
        $array2 = array("b" => "green", "yellow", "red");
        return array_diff($array1, $array2);
    }

    /**
     * @name 使用指定的键和值填充数组
     * @return array
     */
    public function arrayFillKeys()
    {
        $array1 = array(1,'hello',2,'jim');
        $value = ['somebody','me'];
        return array_fill_keys($array1, $value);
    }

    /**
     * @name 指定起始位置填充数组
     * @return array
     */
    public function arrayFill()
    {
        $a = array_fill(1, 6, 'banana');
        return $a;
    }

    /**
     * @name 用回调函数过滤数组
     * @return array
     */
    public function arrayFilter()
    {
        $array = array(1, 2, 3, 4, 5, null);
        return array_filter($array, function($v){
            return  $v;
        });
    }

    /**
     * @param $v
     * @return int
     */
    public function odd($v)
    {
        return $v & 1;
    }

    /**
     * @param $v
     * @return int
     */
    public function even($v)
    {
        return !($v & 1);
    }

    public function plus($v)
    {
        return $v + $v;
    }

    /**
     * @name 交换数组的键和值，返回到新数组中
     * @return array
     */
    public function arrayFlip()
    {
        return array_flip(array(11=>'张三',12=>'李四'));
    }

    /**
     * @name 使用用户自定义函数对数组中的每个元素做回调处理
     * @return array
     */
    public function arrayWalk()
    {
        $array1 = array(1, 2, 3, 4, 5, 6);
        array_walk($array1, function($v,$k){
            echo ($k .'=>'. $v )."<br />";
        });
        return $array1;
    }

    /**
     * @name 将回调函数作用到给定数组的单元上
     * @return array
     */
    public function arrayMap()
    {

        $array1 = [1, 2, 3, 4, 5, 6];
        $array2 = array_map(function($v){
            return $v + $v;
        }, $array1);
        return $array2;
    }

    /**
     * @name 建立一个数组，包括变量名和它们的值
     * @return array
     */
    public function arrayCompact()
    {
        $aa = 'aa';
        $bb = 'bb';
        $cc = 'cc';
        $dd = 'dd';
        $local_vars = ['dd','ee','bb'];
        $result = compact('aa', $local_vars);
        return $result;
    }

    /**
     * laravel 自定义排序
     */
    public function getSortBy()
    {
        $collection = new Collection([
            ['name'=>'pro-001','price'=>'100','num'=>'10'],
            ['name'=>'pro-002','price'=>'10','num'=>'1'],
            ['name'=>'pro-003','price'=>'101','num'=>'2'],
        ]);
        $sortBy = $collection->sortBy(function($v,$k){
           return $v['num'];
        });//->forPage(1,2);
        return $sortBy;
    }


    public function getMap()
    {
        $collection = new Collection([
            ['name'=>'pro-001','price'=>'100','num'=>'10'],
            ['name'=>'pro-002','price'=>'10','num'=>'1'],
            ['name'=>'pro-003','price'=>'101','num'=>'2'],
        ]);
        $map = $collection->map(function($v,$k){
            return $v['num'] * 2;
        });
        return $collection;
    }
}