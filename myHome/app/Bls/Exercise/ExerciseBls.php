<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/12
 * Time: 16:54
 */

namespace App\Bls\Exercise;


use App\Bls\Exercise\Model\ExerciseModel;

class ExerciseBls
{
    public function getList()
    {
        return ExerciseModel::query()->orderByRaw('id desc')->paginate(20);
    }
}