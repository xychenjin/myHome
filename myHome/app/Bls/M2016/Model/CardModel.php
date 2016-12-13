<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/13
 * Time: 14:36
 */

namespace App\Bls\M2016\Model;


use Illuminate\Database\Eloquent\Model;

class CardModel extends Model
{
    protected $connection = 'db_m2016';

    protected $table = 't_card';

    protected $guarded = [];

    protected $hidden = [];

}