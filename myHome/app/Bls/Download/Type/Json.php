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

    private $data = [];

    /**
     * Json constructor.
     * @param string $dir   自定义文件存放目录
     * @param string $file  文件命名
     */
    public function __construct($dir = '', $file = '')
    {
        $this->path = is_dir($dir) ? $dir : $this->path.'/'.date('Y-m-d') ;
        $this->filename = date('Y-m-d-His'). '.json';

        if (! file_exists($this->path)) {
            mkdir($this->path, 0777, true);
        }
        $this->file = $this->path . '/'. $this->filename;
        $this->fileBls = new FileBls($this->storageFile);
    }

    private function getUrl()
    {
        return 'http://'. env('HOST_HTML'). '/storage/json';
    }

    private function getHost()
    {
        $domain = env('HOST_DOMAIN');
        return strpos('http://', $domain) !== false ? $domain : 'http://'. $domain;
    }

    public function with($data)
    {
        $this->data[] = $data;
    }

    public function append()
    {
        try {
            $data = $this->format($this->data);

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

        $this->fileBls->setType(FILE_NO_DEFAULT_CONTEXT);

        return $this->fileBls->store([$this->md5 => rtrim($this->getHost(), '/'). '/'. $this->file]);
    }

    private function format($data)
    {
        return $data;
    }

    public function export()
    {
        return rtrim($this->getHost(), '/'). '/'.$this->file;
    }

    public function getMd5()
    {
        return $this->md5;
    }

    public function getStorage($key)
    {
        return $this->fileBls->getKey($key);
    }
}