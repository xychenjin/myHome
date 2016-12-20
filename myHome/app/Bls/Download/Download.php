<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/4 0004
 * Time: 下午 7:06
 */

namespace App\Bls\Download;

use App\Bls\Download\Type\Csv;
use App\Bls\Download\Type\Json;
use App\Bls\Download\Type\Sql;
use App\Bls\Download\Type\Txt;

class Download implements IDownload
{
    protected $obj = null;

    /**
     * 文件导出目录
     *
     * @var string
     */
    protected $path = 'temp/';

    protected $data = [];

    public function __construct($type = '', $path = '')
    {
        $this->path = ! empty($path) ? rtrim($path, '/') : $this->path;

        //设置存放导出文件的位置：将保存在网站根目录的自定义或temp文件中
        $this->choose($type, $this->path);
    }

    public function getData()
    {
        return $this->data;
    }

    public function with($data)
    {
        $this->data[] = empty($data) ? null: (array)$data;
    }
    /**
     * 追加至文件中
     * @param $data
     * @return mixed
     */
    public function append()
    {
        return $this->obj->append($this->data);
    }

    /**
     * 导出文件夹
     *
     * @return mixed
     */
    public function export()
    {
        return $this->obj->export();
    }

    /**
     * 获取加密后的文件对应的路径
     *
     * @return mixed
     */
    public function getMd5()
    {
        return $this->obj->getMd5();
    }

    /**
     * 获取文件存储路径：可域名访问
     *
     * @param $key
     * @return mixed
     */
    public function getStorage($key)
    {
        return $this->obj->getStorage($key);
    }

    /**
     * 获取导出文件存储目录
     *
     * @return mixed
     */
    public function getStorageDir()
    {
        return $this->obj->getStorageDir();
    }

    /**
     * 获取KEY存放目录
     *
     * @return mixed
     */
    public function getLocal()
    {
        return $this->obj->getLocal();
    }

    /**
     * 自定义选择工厂类
     *
     * @param $type
     * @param $path
     * @throws \Exception
     */
    private function choose($type, $path)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'json':
                $this->obj = new Json($path);
                return;
            case 'csv':
                $this->obj = new Csv($path);
                return;
            case 'sql':
                $this->obj = new Sql($path);
                return;
            case 'txt':
                $this->obj = new Txt($path);
                return;
        }
        throw new \Exception('未知导出文件类型');
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    /**
     * 清空数据值
     */
    public function free()
    {
        $data = & $this->data;
        unset($this->data, $data);
    }

    public function getFile()
    {
        return $this->obj->getFile();
    }
}