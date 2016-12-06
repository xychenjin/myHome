<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/6
 * Time: 13:40
 */

namespace App\Bls\File;


class FileBls
{
    protected $file = '';

    //默认写入文件：追加，可选（FILE_NO_DEFAULT_CONTEXT）
    protected $type = 'a+';

    public function __construct($file)
    {
        $this->file = $file;

        $path = substr($this->file, 0, strrpos($this->file, '/'));

        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    public function setType($type)
    {
        switch($type) {
            case FILE_APPEND:
                $this->type = 'a+';
                return ;
            case FILE_NO_DEFAULT_CONTEXT:
                $this->type = 'w+';
                return ;
        }
        throw new \Exception('未知文件写入类型');
    }

    /**
     * 解析本地存储文件，将其全部读取出来
     *
     * @return array|mixed
     */
    private function parse()
    {
        $path = substr($this->file, 0, strrpos($this->file, '/'));
        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (! file_exists($this->file)) {
            $this->write();
        }
        $file = file_get_contents($this->file);
        $data = [];
        if ( $file != '') {
            $data = json_decode($file, true);
        }
        return $data;
    }

    public function store( array $data)
    {
        $parseData = $this->parse();
        foreach ($data as $key => $value) {
            $parseData[$key] = $value;
        }
        return $this->write(json_encode($parseData));
    }

    public function getKey($key)
    {
        $parseData = $this->parse();
        return array_key_exists($key, $parseData)? $parseData[$key] : '';
    }

    public function remove($key)
    {
        $parseData = $this->parse();
        if (isset($parseData[$key]))
            unset($parseData[$key]);
    }

    /**
     * 写入文件:当文件较大时，自动锁
     *
     * @param string $data
     * @return bool
     */
    public function write($data = '')
    {
        $handler = fopen($this->file, $this->type);

        if (flock($handler, LOCK_EX)) {
            fwrite($handler, $data);
            flock($handler, LOCK_UN);
        }

        fclose($handler);
        return true;
    }
}