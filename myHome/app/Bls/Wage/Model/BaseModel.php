<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/22
 * Time: 17:19
 */

namespace App\Bls\Wage\Model;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = 'db_m2016';
}