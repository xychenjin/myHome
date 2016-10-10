<?php

namespace App\Bls\Design\Transport;


abstract class Transport
{
    //启动
    abstract public function start();

    //运行
    abstract public function run();

    //停止
    abstract public function stop();
}