<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/11/30
 * Time: 10:05
 */

namespace App\Http\Controllers\CodeBeautify;


use App\Http\Controllers\Controller;

/**
 * 代码优化类
 *
 * Class CodeController
 * @package App\Http\Controllers\CodeBeautify
 */
class CodeController extends Controller
{
    public function index()
    {
        $aa = '这是一个内存测试';

        $p = & $aa;

        echo $aa."<br/>";
        unset($aa);

        echo $p."<br/>";

        unset($p);

        echo "释放内存后<br/>";

//        echo "打印释放后变量aa:$aa";
//        echo "打印释放后$p";
    }

    public function delete()
    {
//        $user = array(
//            0 => array(
//                'id' => 1,
//                'name' => '张三',
//                'email' => 'zhangsan@sina.com',
//            ),
//            1 => array(
//                'id' => 2,
//                'name' => '李四',
//                'email' => 'lisi@163.com',
//            ),
//            2 => array(
//                'id' => 5,
//                'name' => '王五',
//                'email' => '10000@qq.com',
//            ));

//        $dd = array_map('array_shift', $user);

        $user = array(
            'id' => 5,
            'name' => '王五',
            'email' => '10000@qq.com',
        );
        $dd = array_column($user, 'id');

//        echo strtr("Hilla Warld","ia","e");

//        $aaaa = ip2long('192.168.1.11');
        $aaaa = ip2long('117.184.3.142');
//        $aaaa = long2ip(-1062731509);
        $aaaa = long2ip(1974993806);
        dd($aaaa);//-1062731509
        dd($dd);
    }

}