<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/9
 * Time: 14:09
 */

namespace App\Bls\Download\Type;

use App\Bls\File\FileBls;

class Type
{

    /**
     * 文件对应加密值
     *
     * @var string
     */
    public $md5 = '';

    /**
     * 完整的文件访问路径，对外访问地址
     *
     * @var string
     */
    public $file = '';

    /**
     * 导出文件存放总目录
     *
     * @var string
     */
    protected $dir = '';

    /**
     * 导出文件存放父级目录
     *
     * @var string
     */
    protected $path = '';

    /**
     * 文件名
     *
     * @var string
     */
    protected $filename = '';

    /**
     * 文件导出处理类
     *
     * @var FileBls|null
     */
    protected $fileBls = null;

    /**
     * 当前格式对应文件加密值对照表
     *
     * @var string
     */
    protected $storageFile = 'storage.json';

    /**
     * 文件加密值对照表文件是否已创建：第一次创建时未创建，自动判断是否需要手动创建文件
     *
     * @var bool
     */
    protected $unCreate = true;

    /**
     * 文件后缀名
     *
     * @var string
     */
    protected $extension ;

    /**
     * Json constructor.
     * @param string $dir   自定义文件存放目录
     * @param string $file  文件命名
     */
    public function __construct($dir = '', $file = '')
    {
        $this->storageFile = ltrim(rtrim(! empty($dir) ? $dir : $this->dir, '/') . '/'. rtrim($this->path, '/') . '/'. $this->storageFile, '/');

        $this->path =  ltrim(rtrim(! empty($dir)  ? $dir : $this->dir, '/') . '/' . $this->path .'/'.date('Y-m-d'), '/') ;
        $this->filename = date('Y-m-d-His'). $this->extension;
        $this->file =  ltrim($this->path . '/'. $this->filename, '/');

        if (! isset($this->fileBls) ) {
            $this->fileBls = new FileBls($this->file);
        }
    }

    /**
     * 将数据追加到文件中
     *
     * @param array $data
     * @throws \Exception
     */
    public function append(array $data)
    {
        try {
            $data = $this->format($data);
            $this->fileBls->setFile($this->file);
            $this->fileBls->setType(FILE_APPEND);
            $this->fileBls->write($data);
            $this->md5 = md5($this->file);
            $this->unCreate && $this->storage();
        } catch(\Exception $e) {
            throw $e;
        }
    }

    /**
     * 自动解析文件并存储键值对应文件名
     *
     * @return bool
     * @throws \Exception
     */
    protected function storage()
    {
        $this->unCreate = false;
        $this->fileBls->setFile($this->storageFile);
        $this->fileBls->setType(FILE_NO_DEFAULT_CONTEXT);

        return $this->fileBls->storeKey([$this->md5 => rtrim(getHost(), '/'). '/'. $this->file]);
    }

    /**
     * 格式化输出数据
     *
     * @param array $data
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    protected function export()
    {
        return rtrim(getHost(), '/'). '/'. $this->file;
    }

    /**
     * 获取文件加密字符
     *
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * 获取文件导出存储位置
     *
     * @param $key
     * @return string
     */
    public function getStorage($key)
    {
        $this->fileBls->setFile($this->storageFile);
        return $this->fileBls->getKey($key);
    }

    public function getStorageDir()
    {
        return $this->path;
    }

    /**
     * 获取完整的文件存储目录
     *
     * @return string
     */
    public function getLocal()
    {
        return rtrim(getHost(), '/'). '/'. $this->storageFile;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function getFile()
    {
        return rtrim(getHost(), '/'). '/'.$this->file;
    }
}