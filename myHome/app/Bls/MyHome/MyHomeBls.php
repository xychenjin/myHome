<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/7
 * Time: 13:43
 */

namespace App\Bls\MyHome;


class MyHomeBls
{
    public $count = 0 ;

    public $total = 0;

    public $file = 0;

    public $dir = 0;

    public function getIndex()
    {
        //创建如上图所示的二叉树
        $a = new Node();
        $b = new Node();
        $c = new Node();
        $d = new Node();
        $e = new Node();
        $f = new Node();
        $a->value = 'A';
        $b->value = 'B';
        $c->value = 'C';
        $d->value = 'D';
        $e->value = 'E';
        $f->value = 'F';
        $a->left = $b;
        $a->right = $c;
        $b->left = $d;
        $c->left = $e;
        $c->right = $f;
        echo "后序遍历\r\n";
        return $this->postorder($a);
    }

    public function getHanoi()
    {
        $n = 4;
        $this->hanoi(4,'A','B','C');
        echo '运行次数：2^'.$n.'-1='.(pow(2,$n)-1).' 次 ';
        return true;
    }
    //前序遍历，访问根节点->遍历子左树->遍历右左树
    function preorder($root){
        $stack = array();
        array_push($stack, $root);
        while(!empty($stack)){
            $center_node = array_pop($stack);
            echo $center_node->value.' ';

            if($center_node->right != null) array_push($stack, $center_node->right);
            if($center_node->left != null) array_push($stack, $center_node->left);
        }
    }
//中序遍历，遍历子左树->访问根节点->遍历右右树
    function inorder($root){
        $stack = array();
        $center_node = $root;
        while (!empty($stack) || $center_node != null) {
            while ($center_node != null) {
                array_push($stack, $center_node);
                $center_node = $center_node->left;
            }

            $center_node = array_pop($stack);
            echo $center_node->value . " ";

            $center_node = $center_node->right;
        }
    }
//后序遍历，遍历子左树->访问子右树->遍历根节点
    function postorder($root){
        $pushstack = array();
        $visitstack = array();
        array_push($pushstack, $root);

        while (!empty($pushstack)) {
            $center_node = array_pop($pushstack);
            array_push($visitstack, $center_node);
            if ($center_node->left != null) array_push($pushstack, $center_node->left);
            if ($center_node->right != null) array_push($pushstack, $center_node->right);
        }

        while (!empty($visitstack)) {
            $center_node = array_pop($visitstack);
            echo $center_node->value. " ";
        }
    }

    /*==================================================================================*/
        #简单的用php实现了汉诺塔问题的求解，使用递归调用，但是用php实现要是盘子的个数很多的话，运行起来会很慢的...
        #汉诺塔主要是有三个塔座X，Y，Z，要求将三个大小不同，依小到大编号为1，2.....n的圆盘从A移动到塔座Z上，要求
        #（1）：每次只能移动一个圆盘
        #（2）：圆盘可以插到X，Y，Z中任一塔座上
        #（3）：任何时候不能将一个较大的圆盘压在较小的圆盘之上
        #主要是运用了递归的思想，这里使用php做个简单的实现
    /*==================================================================================*/
    /**
     *
     * @param $n   盘子序号
     * @param $x   出发地
     * @param $y   路过
     * @param $z   目的地
     */
    public function hanoi($n,$x,$y,$z){
        if($n==1){

            $this->move($x,1,$z);

        }else{

            $this->hanoi($n-1,$x,$z,$y);

            $this->move($x,$n,$z);

            $this->hanoi($n-1,$y,$x,$z);

        }
    }

    public function move($x,$n,$z){
        $this->count ++;
        echo '第'.$this->count.'次：move disk '. $n .' from '.$x.' to '.$z.' <br>';

    }


    //快速排序算法
    public function quickSort($arr)
    {
        if(count($arr) > 1 ){
            $temp = $arr[0];
            $left = [];
            $right = [];
            for($i = 1;$i < count($arr); $i++ ){
                if($arr[$i] <= $temp ){
                    $left[] = $arr[$i];
                }elseif($arr[$i] > $temp ){
                    $right[] = $arr[$i];
                }
            }
            $left = $this->quickSort($left);
            $right = $this->quickSort($right);
            return array_merge($left, [$temp], $right);
        }else{
            return $arr;
        }
    }

    public function getAllFile($dir)
    {
        $scanDir = scandir($dir);
        if( $scanDir === false ){
            unset($scanDir);
            return false;
        }
        if ( is_array($scanDir) ){
            while(list($key, $file) = each($scanDir) ){
                $fileName = $dir. '/' . $file;//iconv('GBK', 'UTF-8//IGNORE', $dir. '/' . $file);
                if($file == '.'|| $file == '..'){
                    continue;
                }
                elseif( is_file($fileName) ){
                    echo '文件：'. $fileName. "\n";
                    $this->file ++;
                    $this->total ++;
                    continue;
                }elseif( is_dir($fileName) ){
                    echo "\n目录：{$fileName}\n";
                    $this->dir ++;
                    $this->total ++;
                    $this->getAllFile($fileName);
                }else{
                    echo '未知类型: '.$fileName."\n";
                }
                unset($fileName);
            }
            return true;
        }
        unset($scanDir);
        return false;
    }
}
/**
 * 二叉树遍历
 * @blog<http://www.phpddt.com>
 */
class Node {
    public $value;
    public $left;
    public $right;
}
