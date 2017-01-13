<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/13
 * Time: 9:38
 */

namespace App\Bls\Bonus;


use App\Bls\Bonus\Model\BonusLogModel;
use App\Bls\Bonus\Model\BonusModel;
use App\Consts\Bonus\BonusLimitConsts;
use App\Consts\Bonus\BonusStatusConsts;

class BonusBls
{
    public function getList($where = [], $orderBy = 'id desc', $paginator = 20)
    {
        $query = BonusModel::query();
        if (isset($where['status']) ) {
            $query->where('status', $where['status']);
        }
        if (isset($where['type']) ) {
            $query->where('type', $where['type']);
        }
        return $query->orderByRaw($orderBy)->paginate($paginator);
    }

    public function find($id)
    {
        return BonusModel::findOrFail($id);
    }

    public function getLogsById($id, $orderBy = 'id desc', $paginator = 20)
    {
        return BonusLogModel::where('bonus_id', $id)->orderByRaw($orderBy)->paginate($paginator);
    }

    public function fetchList($where = [], $orderBy = 'id desc', $paginator = 20)
    {
        return BonusModel::query()->ofEnable()->ofCan()->orderByRaw($orderBy)->paginate($paginator);
    }

    public function checkBonusStatus(BonusModel $bonus)
    {
        try {
            if ($bonus->status !== BonusStatusConsts::STATUS_ENABLE_CONST) {
                return false;
            }

            $prefixKey = BonusLimitConsts::BONUS_PREFIX . $bonus->id;
            $res = \Redis::get($prefixKey);
            $data = json_decode($res);
            if (empty($data)) {
                $bonus->status = BonusStatusConsts::STATUS_EXPIRE_CONST;
                $bonus->save();
                //多于的钱将退还到原账户
                return $bonus;
            }

            return false;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}