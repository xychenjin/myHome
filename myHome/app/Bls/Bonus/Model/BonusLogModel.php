<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/12
 * Time: 18:03
 */

namespace App\Bls\Bonus\Model;


use App\Consts\Bonus\BonusStatusConsts;
use Illuminate\Database\Eloquent\Model;

class BonusLogModel extends Model
{
    protected $connection = 'db_m2016';

    protected $table = 't_bonus_log';

    protected $guarded = [];

    public function bonus()
    {
        return $this->belongsTo(BonusModel::class, 'bonus_id' );
    }

    public function getIsBestAttribute()
    {
        if ($this->bonus->status != BonusStatusConsts::STATUS_EMPTY_CONST) {
            return false;
        }
        $isBest = BonusLogModel::where('bonus_id', $this->bonus_id)->orderByRaw('amount desc,created_at asc')->first();

        return $this->id == $isBest->id ;
    }
}