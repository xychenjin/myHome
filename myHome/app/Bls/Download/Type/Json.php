<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/4 0004
 * Time: 下午 6:59
 */

namespace App\Bls\Download\Type;

use App\Bls\File\FileBls;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class Json
{
    private $md5 = '';

    private $path = 'temp/json';
    private $file = '';
    private $filename = '';

    protected $fileBls = null;

    protected $storageFile = 'temp/json/storage.json';

    private $unCreate = true;

    /**
     * Json constructor.
     * @param string $dir   自定义文件存放目录
     * @param string $file  文件命名
     */
    public function __construct($dir = '', $file = '')
    {
        $this->path = is_dir($dir) ? $dir : $this->path .'/'.date('Y-m-d') ;
        $this->filename = date('Y-m-d-His'). '.json';

        $this->file = $this->path . '/'. $this->filename;
        $this->fileBls = new FileBls($this->file);
    }

    private function getUrl()
    {
        return 'http://'. env('HOST_HTML'). '/storage/json';
    }

    public function append($data)
    {
        try {
            $data = $this->format($data);

            $this->fileBls->setFile($this->file);
            $this->fileBls->write(json_encode($data));

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
     */
    protected function storage()
    {
        $this->unCreate = false;

        $this->fileBls->setFile($this->storageFile);
        $this->fileBls->setType(FILE_NO_DEFAULT_CONTEXT);

        return $this->fileBls->storeKey([$this->md5 => rtrim(getHost(), '/'). '/'. $this->file]);
    }

    private function format($data)
    {
        return $data;
    }

    public function export()
    {
        return rtrim(getHost(), '/'). '/'.$this->file;
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
}