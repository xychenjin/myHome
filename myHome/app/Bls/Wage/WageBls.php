<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/22
 * Time: 17:19
 */

namespace App\Bls\Wage;


use App\Bls\Wage\Model\WageModel;

class WageBls
{
    public function getListByPage($searchData, $orderByRaw = '`id` desc', $paginator = 20)
    {
        return WageModel::query()->orderByRaw($orderByRaw)->paginate($paginator);
    }
}