<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/12
 * Time: 18:01
 */

namespace App\Bls\Bonus\Model;


use App\Consts\Bonus\BonusStatusConsts;
use App\Consts\Bonus\BonusTypeConsts;
use Illuminate\Database\Eloquent\Model;

class BonusModel extends Model
{
    protected $connection = 'db_m2016';

    protected $table = 't_bonus';

    protected $guarded = [];

    public function logs()
    {
        return $this->hasMany(BonusLogModel::class, 'bonus_id');
    }

    public function scopeOfEnable($query)
    {
        return $query->where('status', BonusStatusConsts::STATUS_ENABLE_CONST);
    }

    public function scopeOfCan($query)
    {
        return $query->where('number', '<>', $this->logs()->count());
    }

    public function getStatusDescAttribute($value)
    {
        return BonusStatusConsts::desc($this->status);
    }

    public function getTypeDescAttribute($value)
    {
        return BonusTypeConsts::desc($this->type);
    }

    public function getHasLogsAttribute()
    {
        return $this->logs()->count() > 0 ? true :false;
    }

    public function getNumberDescAttribute()
    {
        return ($this->hasLogs && $this->status == BonusStatusConsts::STATUS_ENABLE_CONST)
            ? $this->logs()->count() . '/'. $this->number : $this->number;
    }

    public function getIsFetchOutAttribute()
    {
        return $this->number == $this->logs()->count() ? true : false;
    }

    public function getIsFetchOutDescAttribute()
    {
        if (! $this->isFetchOut) {
            return '';
        }
        $log = $this->logs()->orderBy('id','desc')->first();
        $diffs = strtotime($log->created_at) - strtotime($this->created_at);
        if ($diffs <= 60) {
            $msg = $diffs .'秒';
        } elseif ($diffs> 60 && $diffs <= 3600) {
            $msg = ceil($diffs/60) .'分';
        } else {
            $msg = ceil($diffs/3600) .'小时';
        }
        return $msg;
    }

}