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
        $content = "something wrong,p";
    }

}