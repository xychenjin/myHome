<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/2
 * Time: 11:13
 */
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

    function array_multi2single($array)
    {
        static $result_array = array();
        foreach ($array as $value) {
            if (is_array($value)) {
                array_multi2single($value);
            }
            else
                $result_array[] = $value;
        }
        return $result_array;
    }
}