<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 13:27
 */

namespace App\Bls\Design\Demo\Singleton\PublicKey;

class PublicKey
{
    private static $key;

    private $rand;

    //防止被NEW
    private function __construct()
    {
        echo '于：'. date('Y-m-d H:i:s', time()). ' 被示例化了一次!'. "<br />";
        $this->rand = rand(1,999999);
    }

    //防止被克隆
    private function __clone()
    {

    }

    //外部访问地址
    public static function get()
    {
        if (! isset(self::$key)) {
            self::$key = new self;
        }

        return self::$key;
    }

    //输出
    public function out()
    {
        return '实例化：'. __CLASS__;
    }

    //获取随机数
    public function rand()
    {
        return $this->rand;
    }
}