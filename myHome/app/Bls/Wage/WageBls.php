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
        $query = WageModel::query();
        if (isset($searchData['way']) && !empty($searchData['way'])) {
            $query->where('trans_way', $searchData['way']);
        }
        if (isset($searchData['startDate']) && !empty($searchData['startDate'])) {
            $query->where('sent_date', '>=', $searchData['startDate']);
        }
        if (isset($searchData['endDate']) && !empty($searchData['endDate'])) {
            $query->where('sent_date', '<=', $searchData['endDate']);
        }

        return $query->orderByRaw($orderByRaw)->paginate($paginator);
    }
}