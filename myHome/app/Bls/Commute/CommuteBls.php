<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/15
 * Time: 10:07
 */

namespace App\Bls\Commute;


use App\Bls\Commute\Model\CommuteModel;
use Pingpong\Admin\Entities\User;

class CommuteBls
{
    public function getListByPage($searchData, $orderByRaw = 'day desc, updated_at desc', $paginator = 8)
    {
        $query = CommuteModel::query();

        if (isset($searchData['day']) && ! empty($searchData['day'])) {
            $query->where('day', $searchData['day']);
        }
        if (isset($searchData['week_th']) && is_numeric($searchData['week_th'])) {
            $query->where('week_th', $searchData['week_th']);
        }
        if (isset($searchData['userName']) && ! empty($searchData['userName'])) {
            $query->whereIn('user_id', User::where('name', 'like', '%'.$searchData['userName']. '%')->lists('id'));
        }
        if (isset($searchData['tools']) && !empty($searchData['tools'])) {
            $query->where('tools', 'like','%'. trim($searchData['tools']) . '%');
        }
        if (isset($searchData['startDay']) && !empty($searchData['startDay'])) {
            $query->where('day', '>=', $searchData['startDay']);
        }
        if (isset($searchData['endDay']) && !empty($searchData['endDay'])) {
            $query->where('day', '<=', $searchData['endDay']);
        }

        if (isset($searchData['subscribe']) && is_numeric($searchData['subscribe'])) {
            $query->where('is_subscribe', $searchData['subscribe']);
        }

        return $query->orderByRaw($orderByRaw)->paginate($paginator);
    }
}