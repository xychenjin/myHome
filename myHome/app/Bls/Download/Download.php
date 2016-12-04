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

    protected $file = '';
    protected $dir = '';

    public function __construct($type, $dir = '')
    {
        $this->choose($type, $dir);
    }

    public function append($data)
    {
        return $this->obj->append($data);
    }

    public function export()
    {
        return $this->obj->export();
    }

    private function choose($type, $dir)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'json':
                $this->obj = new Json($dir);
                break;
            case 'csv':
                $this->obj = new Csv($dir);
                break;
            case 'sql':
                $this->obj = new Sql($dir);
                break;
            case 'txt':
                $this->obj = new Txt($dir);
                break;
        }

        throw new \Exception('未知类型');
    }
}