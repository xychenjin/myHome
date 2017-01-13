<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/28
 * Time: 10:30
 */

namespace App\Http\Controllers\Bonus\Traits;


use App\Bls\Bonus\BonusBls;
use App\Bls\Bonus\Model\BonusLogModel;
use App\Bls\Bonus\Model\BonusModel;
use App\Consts\Bonus\BonusLimitConsts;
use App\Consts\Bonus\BonusStatusConsts;
use Illuminate\Database\Eloquent\Model;
use Psr\Log\InvalidArgumentException;

trait BonusTrait
{

    /**
     * 发红包：生成随机金额，供用户来抢
     *
     * @param $inputTotal
     * @param $inputMoney
     * @param $owner
     * @param $name
     * @return bool
     */
    private function make($inputTotal, $inputMoney, $owner, $name)
    {
        try {
            $total = intval($inputTotal);
            $money = floatval($inputMoney);

            if (! is_numeric($total)
                || ! is_numeric($money)
                || $total <= 0
                || $money <= 0
                || intval($money * 100) < $total
                || intval($money * 100) > (BonusLimitConsts::LIMIT_ORDINARY_MAX * 100)
            )
                throw new InvalidArgumentException('输入条件不符合要求');

            $money = intval($money * 100);
            $res = $this->distribute($money, $total);

            $attributes = [
                'amount' => $inputMoney,
                'number' => $inputTotal,
                'balance' => floatval($inputMoney),
                'name' => $name ?: '恭喜发财，大吉大利',
                'owner' => $owner,
            ];
            $model = $this->add(new BonusModel(), $attributes);
            $prefixKey = BonusLimitConsts::BONUS_PREFIX . $model->getKey();
            \Redis::set($prefixKey,json_encode($res));
            \Redis::expireAt($prefixKey, time() + 86400);//24小时后过期
            return $model;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * 随机数，分发池
     * @param $money
     * @param $total
     * @return array
     */
    private function distribute($money, $total)
    {
        $res = [];
        if ($total == 1) {
            $res[] = number_format($money / 100, 2);
        } else {
            $restMoney = $money;
            $resTimes = $total;
            for ($i = 0; $i < $total; $i++) {
                if ($i == $total - 1) {
                    //最后一个，拿走剩余的
                    array_push($res, number_format($restMoney / 100, 2));
                } else {
                    $getMoney = rand(1, intval($restMoney / $resTimes));
                    $restMoney -= $getMoney;
                    array_push($res, number_format($getMoney / 100, 2));
                }
                $resTimes--;
            }
        }
        shuffle($res);
        return $res;
    }

    private function add(Model $model, array $attributes)
    {
        $handle = new $model();
        return $handle->create($attributes);
    }

    /**
     * 抢红包
     * @param $md5Time
     * @param $rand
     * @param $userId
     * @return bool
     */
    private function fetch($key, $userId)
    {
        try {
            $prefixKey = BonusLimitConsts::BONUS_PREFIX .$key;
            $res = \Redis::get($prefixKey);
            $ponds = json_decode($res);
            $bls = new BonusBls();
            $model = $bls->find($key);

            if ( empty($model)) {
                return new \Exception('红包不存在！');
            }
            if (empty($ponds) || $model->status !== BonusStatusConsts::STATUS_ENABLE_CONST || $model->balance == 0) {
                $msg = $model->statusDesc;
                if (empty($ponds)) {
                    $model->status == BonusStatusConsts::STATUS_ENABLE_CONST && $model->status = BonusStatusConsts::STATUS_EXPIRE_CONST ;
                    $model->save();
                }
                throw new \Exception(isset($msg )? $msg : '抢红包失败！');
            }
            $rand = array_rand($ponds);
            $getMoney = $ponds[$rand];
            $restMoney = ($model->balance - $getMoney) < 0 ? 0 : ($model->balance - $getMoney);
            //查看是否过期，是否已抢完. etc.
            $attributes = [
                'amount' => $getMoney,
                'name' => $model->name,
                'balance' => $restMoney,
                'number' => 1,
                'bonus_id' => $model->id,
                'user_id' => $userId,
                'owner' => $model->owner,
            ];

            $this->add(new BonusLogModel(), $attributes);
            unset($ponds[$rand]);
            if ( empty($ponds) && count($ponds) == 0) {
                $model->status == BonusStatusConsts::STATUS_ENABLE_CONST && $model->status = BonusStatusConsts::STATUS_EMPTY_CONST ;
                $restMoney == 0 && $model->status =  BonusStatusConsts::STATUS_EMPTY_CONST;
                \Redis::del($prefixKey);
            } else {
                \Redis::set($prefixKey, json_encode(array_values($ponds)));
                $restTime = strtotime("{$model->created_at} +1 day") - time();
                \Redis::expire($prefixKey, $restTime);//剩余时间后过期
            }
            $model->balance = $restMoney;
            $model->save();
            return $getMoney;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}