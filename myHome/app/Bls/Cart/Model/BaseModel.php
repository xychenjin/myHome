<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18 0018
 * Time: 下午 8:44
 */

namespace App\Bls\Cart\Model;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = 'db_first';
}