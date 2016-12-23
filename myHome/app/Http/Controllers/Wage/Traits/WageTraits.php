<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/22
 * Time: 17:48
 */

namespace App\Http\Controllers\Wage\Traits;


use App\Bls\Wage\Model\WageModel;

trait WageTraits
{
    public function getSelectedDates()
    {
        return WageModel::selectRaw('received_date')
            ->distinct()
            ->lists('received_date', 'received_date')
            ->toArray();
    }
}