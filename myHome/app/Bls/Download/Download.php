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
    
    protected $path = '';

    public function __construct($type = '', $path = '')
    {
        $this->choose($type, $path);
    }

    public function prepare()
    {

    }

    public function with($data)
    {
        return $this->obj->with($data);
    }
    /**
     * 追加至文件中
     * @param $data
     * @return mixed
     */
    public function append()
    {
        return $this->obj->append();
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
     * 获取文件存储位置
     *
     * @param $key
     * @return mixed
     */
    public function getStorage($key)
    {
        return $this->obj->getStorage($key);
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
}