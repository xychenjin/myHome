<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/7
 * Time: 18:39
 */

namespace App\Bls\Format;


class DataBls
{
    private $preview = '';
    private $standard = '';

    public function __construct($data = '')
    {
        $this->data = $data;
    }

    public function format()
    {
        //do something
        $this->preview = 'users';
        $this->data = '1,2,3';
    }

    public function create()
    {
        return sprintf($this->standard, $this->preview, $this->data);
    }

    private function setStandard($type)
    {
        switch($type){
            case 'key':
                $this->standard = 'INSERT INTO %s VALUES %s';
                return ;
            case 'val':
                $this->standard = '(%s)';
        }

        throw new \Exception('未知类型');
    }

    private function getStandard()
    {
        return $this->standard;
    }
}