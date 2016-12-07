<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/2
 * Time: 11:13
 */
use Illuminate\Support\Debug\Dumper;

if (!function_exists("staticUrl")) {
    /**
     * @param $uri
     * @return string
     */
    function staticUrl($uri = "")
    {
        $schema = "http://";
        return $schema . rtrim(config('host.static'), "/") . "/" . ltrim($uri, "/");
    }
}

if (! function_exists('getHost')) {
    function getHost()
    {
        $domain = env('HOST_DOMAIN');
        return strpos('http://', $domain) !== false ? $domain : 'http://'. $domain;
    }
}

if (! function_exists("objectToArray")) {
    function objectToArray($obj)
    {
        $arr = array();
        $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
        if (! empty($_arr)) {
            foreach ($_arr as $key => $val) {
                $val = (is_array($val) || is_object($val)) ? objectToArray($val) : $val;
                $arr[$key] = $val;
            }
        }
        return $arr;
    }
}

if (! function_exists("array_multi2single")) {
    function array_multi2single($array)
    {
        static $result_array = array();
        foreach ($array as $value) {
            if (is_array($value)) {
                array_multi2single($value);
            } else
                $result_array[] = $value;
        }
        return $result_array;
    }
}

if (! function_exists("pp")) {
    function pp()
    {
        array_map(function ($x) {
            (new Dumper)->dump($x);
        }, func_get_args());

        return '';
    }
}

if (! function_exists("scanMyDir")) {
    /**
     * 浏览目录下所有文件
     *
     * @param string $path 目录
     * @param array $appends 必须：追加至原始数组中
     * @param string $search 可选：文件路径中需要过滤的文档，相对于传入目录
     * @param string $replace 可选：替换操作，当过滤参数添加时，默认替换为空
     * @return array &引用
     */
    function scanMyDir($path, & $appends, $search = '', $replace = '')
    {
        $dir = scandir($path);

        while (list(, $val) = each($dir)) {
            $fileName = $path . '/' . $val;
            if ($val == '.' || $val == '..') {
                continue;
            } elseif (is_file($fileName)) {
                array_push($appends, ltrim(str_replace($search, $replace, $fileName), '/'));
            } elseif (is_dir($fileName)) {
                scanMyDir($fileName, $appends, $search, $replace);
            }
        }
    }
}
