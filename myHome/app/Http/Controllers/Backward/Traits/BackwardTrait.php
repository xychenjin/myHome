<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/27
 * Time: 10:45
 */

namespace App\Http\Controllers\Backward\Traits;


trait BackwardTrait
{
    public function getSelectedYears()
    {
        $year = $y = date('Y');
        $i = 0;
        $res = [];
        while(intval($year) > 2010) {
            $year = $y - $i;
            $res[$year] = $year. '年';
            $i++;
        }
        return $res;
    }
}