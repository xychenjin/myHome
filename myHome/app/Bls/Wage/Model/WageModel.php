<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/22
 * Time: 17:20
 */

namespace App\Bls\Wage\Model;


use App\Consts\Wage\WageTransWayConst;

class WageModel extends BaseModel
{
    protected $table = 't_wage';

    protected $guarded = [];

    public function getTransWayDescAttribute()
    {
        return WageTransWayConst::desc($this->trans_way);
    }

}