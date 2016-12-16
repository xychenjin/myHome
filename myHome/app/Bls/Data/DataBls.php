<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/7
 * Time: 18:39
 */

namespace App\Bls\Data;


use App\Consts\Download\DownloadConst;

class DataBls
{
    /**
     * 表名称
     *
     * @var string
     */
    protected $prefix = '';

    /**
     * 表字段
     *
     * @var string
     */
    protected $columns = '';

    /**
     * 标准插入SQL模板
     *
     * @var string
     */
    protected $standard = '';

    /**
     * 是否需要转换
     * @var bool
     */
    protected $needTransfer = false;

    /**
     * 常量模板语句选择
     */
    const CASE_ALL = 'all';
    const CASE_TAIL = 'tail';

    /**
     * DataBls constructor.
     * @param string $data
     * @param string $type
     */
    public function __construct($data = '', $type = '')
    {
        $this->data = $data;
        $this->type = empty($type) ? DownloadConst::DEFAULT_TYPE : $type;

        $this->choose();
    }

    /**
     * 自动选择数据类型
     *
     * @throws \Exception
     */
    private function choose()
    {
        switch ($this->type) {
            case DownloadConst::INSERT_TYPE :
                $this->needTransfer = true;
                break;
            case DownloadConst::DEFAULT_TYPE :
                $this->needTransfer = false;
                break ;
            default :
                throw new \Exception('未知类型');
        }
    }

    /**
     * 解析数据并拼接成想要的结果集
     * @return string
     */
    public function parse()
    {
        if (! $this->needTransfer) return $this->data;
        return $this->format();
    }

    private function format()
    {
        if (empty($this->data) || ! is_array($this->data)) {
            return is_array($this->data) ? [] : NULL;
        }

        $data = '';
        $columns = [];
        $this->setStandard(self::CASE_TAIL);
        foreach ($this->data as $key => $value) {
            $tempArray = (array)$value;
            if (empty($columns)) $columns = array_keys($tempArray);
            $array = array_map(function ($item) use($columns) {
                return is_string($item) ? "'". $item. "'" : ($item === null ? 'NULL' : $item);
            }, $tempArray);
            $temp = implode(',', $array);
            $data .= $data ? ',' . sprintf($this->standard, $temp) : sprintf($this->standard, $temp);
        }
        $columns = array_map(function($item) {
            return "`".$item."`";
        }, $columns);
        $this->setStandard(self::CASE_ALL);
        $this->columns = implode(',', $columns);
        return $this->create($data);
    }

    public function create($data)
    {
        return sprintf($this->standard, $this->prefix, $this->columns, $data);
    }

    public function setData($data)
    {
        if ( is_object($data))  throw new \LogicException('类型错误：Object需要转成数组或字符串');
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setStandard($standard)
    {
        switch($standard) {
            case (self::CASE_ALL):
                $this->standard = 'INSERT INTO %s(%s) VALUES %s';
                return ;
            case (self::CASE_TAIL):
                $this->standard = '(%s)';
                return ;
        }

        throw new \Exception('未知类型');
    }

    public function getStandard()
    {
        return $this->standard;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }
}