<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/23
 * Time: 14:10
 */

namespace App\Bls\Card;


use App\Consts\Card\CardStatusConst;
use App\Consts\Card\CardTypeConst;
use Illuminate\Database\Eloquent\Model;

class CardModel extends Model
{
    protected $connection = 'db_m2016';

    protected $table = 't_card';

    protected $guarded = [];

    public function getCardTypeDescAttribute()
    {
        return CardTypeConst::desc($this->type);
    }

    public function getCardStatusDescAttribute()
    {
        return CardStatusConst::desc($this->status);
    }

    public function getCardPwdDescAttribute()
    {
        return implode('-', str_split($this->card_pwd, 4));
    }
}