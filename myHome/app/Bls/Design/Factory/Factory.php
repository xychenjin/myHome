<?php

namespace App\Bls\Design\Factory;


interface Factory
{
    //启动
    public function start();

    //停止
    public function stop();

    //运行
    public function run();

}