<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/4 0004
 * Time: 下午 6:59
 */

namespace App\Bls\Download;


interface IDownload
{
    //添加数据
    public function with($data);

    //追加数据到文档中
    public function append();

    //导出数据
    public function export();
}