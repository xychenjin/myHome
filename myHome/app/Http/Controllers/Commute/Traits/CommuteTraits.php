<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/15
 * Time: 13:12
 */

namespace App\Http\Controllers\Commute\Traits;

use App\Bls\Commute\Model\CommuteModel;
use Carbon\Carbon;

trait CommuteTraits
{
    //入职时间
    protected static $joinTime = '2016-02-28';

    protected $today = '';

    /**
     * 一年的第几周
     *
     * @return array
     */
    public function weekThes()
    {
        $res = [];
        $weeks = date("W", mktime(0, 0, 0, 12, 28, date('Y')));
        for($i = 0; $i < $weeks; $i++) {
           $res[$i] = '第'.($i+1).'周';
        }
        krsort($res);
        return $res;
    }

    /**
     * 一周的第几天
     *
     * @return array
     */
    public function weekDays()
    {
        $res = [];
        $days = ['日', '一', '二', '三', '四', '五', '六'];
        for($i=0; $i < 7; $i++) {
            $res[$i] = '周'.$days[$i];
        }
        krsort($res);
        return $res;
    }

    /**
     * 当前年往前倒数20年
     *
     * @return array
     */
    public function yearThes()
    {
        $year = date('Y');
        $res = [];
        for($i = $year ; $i > ($year-10); $i--) {
            $res[$i] = $i. '年';
        }
        krsort($res);
        return $res;
    }

    /**
     * 获取周几
     *
     * @param $key
     * @return mixed
     */
    public function getWeekDay($key)
    {
        return $this->weekDays()[$key];
    }

    /**
     * 获取第几周
     *
     * @param $key
     * @return mixed
     */
    public function getWeekTh($key)
    {
        return $this->weekThes()[$key];
    }

    /**
     * 格式化结果集
     *
     * @param $data
     * @return mixed
     */
    public function formatList($data)
    {
        foreach($data as $key => $item) {
            $data[$key]->weekTh = $this->getWeekTh($item->week_th);
            $data[$key]->weekdayDesc = $this->getWeekDay($item->weekday);
        }
        return $data;
    }

    /**
     * 返回打卡日期列表
     * @return mixed
     */
    public function getSelectDays()
    {
        $res = collect(['请选择']);
        return $res->merge(CommuteModel::select('day')->orderBy('day', 'desc')->lists('day', 'day'));
    }

    /**
     * 返回选择周次
     * @return array
     */
    public function getSelectWeeks()
    {
        return $this->weekThes();
    }

    /**
     * 获取补签日期：未签到日期往前推30天
     *
     * @return array
     */
    public function getSubscribeDates()
    {
        $res = [];
        $dates = CommuteModel::selectRaw('day')->distinct()->lists('day', 'day')->toArray();
        $i = 1;
        set_time_limit(0);
        while (count($res) < 30) {
            $date = date('Y-m-d', strtotime('-'. $i.' day'));
            $strTime = strtotime($date);
            if (! array_search($date, $dates))
                $res[$date] = date('Y年m月d日', $strTime) . ' ' . $this->getWeekDay(date('w', $strTime));
            $i++;
        }
        return $res;
    }
}