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
}