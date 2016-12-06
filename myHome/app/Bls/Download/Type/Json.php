<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/4 0004
 * Time: 下午 6:59
 */

namespace App\Bls\Download\Type;

class Json
{
    private $dir = '';
    private $file = '';
    private $filename = '';

    public function __construct($dir = '', $file = '')
    {
        $this->dir = ($dir ? $dir : 'C:\Users\administrator\Desktop');
        $this->file = date('Y-m-d H:i:s'). '.json';
        $this->filename = $this->dir . '\\'. $this->file;
    }

    public function append($data)
    {
        $data = $this->format($data);

        if ( file_exists($this->filename) ){
            dd($data);
        } else {
            //如果不存在目录，创建
        }
    }

    private function format($data)
    {
        return $data;
    }

    public function export()
    {
        return $this->filename;
    }
}