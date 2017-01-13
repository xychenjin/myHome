<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/12
 * Time: 16:53
 */

namespace App\Bls\Exercise\Model;


use Illuminate\Database\Eloquent\Model;

class ExerciseModel extends Model
{
    protected $connection = 'db_m2016';

    protected $table = 't_exercise';

    protected $guarded = [];
}