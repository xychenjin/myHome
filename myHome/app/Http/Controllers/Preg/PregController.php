<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/18
 * Time: 10:11
 */

namespace App\Http\Controllers\Preg;


use App\Http\Controllers\Controller;

class PregController extends Controller
{
    public function preg()
    {
        $url = "www.example.com";

        if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?/i', $url) ) {
            echo '匹配到了';
            dd();
        }
        echo "未匹配到对应域名";
    }

    public function searchKey()
    {
        $content = "something wrong,please check the value when you searched!";

        if ($aaa = preg_replace('/(check)/i', '<span style="background:red">$1</span>', $content)) {
            echo $aaa;
            dd();
        }

        dd($content);
    }

    public function getImg()
    {
        $file = @file_get_contents('http://www.hezhiming.cn/');
        $test = iconv('GBK', 'UTF-8', $file);

        //从字符串中提取IMG标签
        $images = [];
        preg_match_all('/(img|src)=(\"|\')[^\"\'>]+/i', $test, $matches);
        unset($test);

        $pregMatch = preg_replace('/(img|src)=(\"|\'|\=\"|\=\')(.*)/i', "$3", $matches[0]);

//        dd($matches);
        foreach ($pregMatch as $url) {
            $info = pathinfo($url);

            if ( isset($info['extension']) ) {
                if ($info['extension'] == 'jpg'|| $info['extension'] == 'jpeg' || $info['extension'] == 'png'
                    || $info['extension'] == 'gif')
                    array_push($images, $url);
            }
        }

        foreach ($images as $image) {
            echo "<img src='$image' /><br/>";
        }
    }

}